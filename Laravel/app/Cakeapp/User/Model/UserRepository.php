<?php


namespace App\Cakeapp\User\Model;

use App\Cakeapp\Common\Eloquent\Repository;
use App\Mail\UserVerified;
use Illuminate\Support\Facades\Mail;

class UserRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        // TODO: Implement model() method.
        return User::class;
    }

    public function getIndexViewData(){
        return User::all();
    }

    public function handleCreate($request)
    {
        $user= $this->create($request->all());
        return $user;
    }

    public function showData($id)
    {
        $user = $this -> findOrFail($id);
        return $user;
    }

    public function handleDelete($id)
    {
        $user = $this -> findOrFail($id);
        $user -> delete();
    }
}
