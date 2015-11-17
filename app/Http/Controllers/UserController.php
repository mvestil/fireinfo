<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;

use App\User;

class UserController extends Controller 
{
	
	public function index()
	{
		$users = User::orderBy('created_at', 'desc')->get();

		return view('users.index', [
				'users' => $users
			]);

	}

	public function showProfile(Request $request, $id) 
	{
		$user = User::findOrFail($id);

		return view('users.profile', compact('user'));
	}

	public function addUser(Request $request)
	{
		$this->validate($request, [
				'name' => 'required|max:255',
				'email' => 'required|email|unique:users',
				'password' => 'required',
				'password_confirm' => 'required|same:password'
			]);
		
		User::create($request->all());

		return redirect('users')
			->with('success', 'Account created successfully');
	}

	public function updateUserPage(Request $request, $id)
	{
		$user = User::findOrFail($id);
		return view('users.update_profile', [
				'user' => $user
			]);
	}

	public function updateUser(Request $request, $id)
	{
		$this->validate($request, [
				'name' => 'required|max:255',
				'current_password' => 'required_with:new_password|required_with:confirm_password',
				'new_password' => 'required_with:current_password',
				'confirm_password' => 'required_with:current_password|same:new_password'
			]);

		$user = User::findOrFail($id);

		if ($request->current_password && $request->current_password !== $user->password)
		{
			$messageBag = new MessageBag();
			$messageBag->add('current_password', 'Current password is not correct.');
			return Redirect::back()->withErrors($messageBag);
		}

		$user->name = $request->name;
		if ($request->new_password)
		{
			$user->password = $request->new_password;
		}
		$user->save();

		return Redirect::back()
			->with('success', 'Account updated successfully');
	}

	public function deleteUser(Request $request, $id)
	{
		$user = User::find($id);

		$success = false;
		if ($user)
		{
			$user->delete();

			$success = true;
			$err_msg = 'User has been deleted successfully';
		}
		else
		{
			$err_msg = 'User not found.';
		}

		return response()->json(compact('success', 'err_msg'));
	}
}