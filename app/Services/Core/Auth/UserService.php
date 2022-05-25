<?php


namespace App\Services\Core\Auth;

use App\Exceptions\GeneralException;
use App\Models\User;
use App\Services\Core\BaseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
class UserService extends BaseService
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create()
    {
        request()->merge([
            'password' => bcrypt(request()->password),
        ]);
        parent::save($this->getFillAble(array_merge(request()->only(
            'name',
            'email',
            'password'
        ), ['status_id' => 1])));

        return $this;
    }


    public function update()
    {
        $this->model->fill($this->getFillAble(request()->only('first_name', 'last_name', 'status_id')));

        throw_if(
            $this->model->isDirty('status_id') && ($this->model->isAppAdmin() || $this->model->id == auth()->id()),
            new GeneralException(trans('default.action_not_allowed'))
        );

        $this->when($this->model->isDirty(), function (UserService $service) {
            $service->notify('user_updated');
        });

        $this->model->save();

        $this->when(request()->get('roles'), function (UserService $service) {
            $service->assignRole(request()->get('roles'));
        });

        return $this->model;
    }

    public function delete(User $user)
    {
        if ($user->isAppAdmin() && !$user->isInvited())
            throw new GeneralException(trans('default.action_not_allowed'));

        if ($user->id == auth()->id())
            throw new GeneralException(trans('default.cant_delete_own_account'));

        return $user->delete();
    }

    public function login()
    {
        /**@var $user User*/
        $attempt = auth()->attempt(request()->only(['email', 'password']));
        if(!$attempt)
        throw new ModelNotFoundException('Wrong Email or Password ');

    }
}
