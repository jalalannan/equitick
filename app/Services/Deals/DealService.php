<?php


namespace App\Services\Deals;
use App\Models\Deal\Deal;
class DealService extends BaseService
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function add($request)
    {
        $status = $this->service
            ->setAttrs($request->only('Login', 'Deal', 'Entry', 'Action', 'Time', 'Symbol', 'Price', 'Profit', 'Volume'))
            ->save();
    }

    public function get($id)
    {
        return $this->model->get($id);
    }

    public function update($rqeuest)
    {
        return $this->model->update($rqeuest);
    }

}