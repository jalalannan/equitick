<?php


namespace App\Helpers\Core\General;


class ResponseHelper
{
    public function createdResponse($name, $data = [])
    {
        return array_merge([
            'status' => true,
            'message' => trans('messages.created_response', [
                'name' => __($name)
            ]),
        ], $data);
    }
    public function loginResponse($name, $data = [])
    {
        return array_merge([
            'status' => true,
            'message' => trans('messages.login_response', [
                'name' => __($name)
            ]),
        ], $data);
    }

    public function returnResponse($name, $data = [])
    {
        return array_merge([
            'status' => true,
            'message' => trans('messages.return_response', [
                'model' => __($name)
            ]),
        ], $data);
    }

    public function updatedResponse($name, $data = [])
    {
        return array_merge([
            'status' => true,
            'message' => trans('default.updated_response', [
                'name' => __t($name)
            ]),
        ], $data);
    }

    public function deletedResponse($name, $data = [])
    {
        return array_merge([
            'status' => true,
            'message' => trans('default.deleted_response', [
                'name' => __t($name)
            ]),
        ], $data);
    }

    public function failedResponse($data = [])
    {
        return array_merge([
            'status' => false,
            'message' => __('messages.failed_response')
        ], $data);
    }

}
