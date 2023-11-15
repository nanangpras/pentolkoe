<?php

namespace App\Repositories\User;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\User\InterfaceUser;

class UserRepository implements InterfaceUser
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->get();
    }

    public function getCategoryProduct()
    {
        return $this->user->where('type','=','produk')->get();
    }

    public function getById($id)
    {
        return $this->user->where('id',$id)->first();
    }

    public function save(Request $request)
    {
        $user = new $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return $user->fresh();
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();
    }

    public function update(Request $request, $id)
    {
        $update = $this->user->find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->role = $request->role;
        $update->save();
        return $update->fresh();
    }
}
