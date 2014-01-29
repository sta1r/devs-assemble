<?php namespace App\Controllers\Admin;
 
use Auth, BaseController, Form, Input, Notification, Redirect, Sentry, View;
 
class AuthController extends BaseController {
 
    /**
     * Display the login page
     * @return View
     */
    public function getLogin()
    {
            return View::make('admin.auth.login');
    }

    /**
     * Login action
     * @return Redirect
     */
    public function postLogin()
    {
            $credentials = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
            );

            try
            {
                    $user = Sentry::authenticate($credentials, false);

                    if ($user)
                    {
                            return Redirect::route('admin.pages.index');
                    }
            }
            catch(\Exception $e)
            {
                    return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
            }
    }

    /**
     * Logout action
     * @return Redirect
     */
    public function getLogout()
    {
            Sentry::logout();

            return Redirect::route('admin.login');
    }


    /**
     * Display the signup page
     * @return View
     */
    public function getSignup()
    {
            return View::make('admin.auth.signup');
    }


    /**
     * Create user
     */
    public function createUser()
    {
        try
        {
            // Create the user
            $user = Sentry::createUser(array(
                //'login'     => Input::get('login'),
                'email'     => Input::get('login'),
                'password'  => Input::get('password'),
                'activated' => true,
            ));

            // Find the group using the group id
            $adminGroup = Sentry::findGroupById(1);

            // Assign the group to the user
            $user->addGroup($adminGroup);

            return Redirect::route('admin.login');


        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }
    }

    /**
     * Update user
     */
    public function updateUser($id)
    {
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById(1);

            // Update the user details
            $user->email = 'john.doe@example.com';
            $user->first_name = 'John';

            // Update the user
            if ($user->save())
            {
                // User information was updated
            }
            else
            {
                // User information was not updated
            }


        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }
    }



    public function index()
    {
        return \View::make('admin.users.index')->with('users', Sentry::findAllUsers());
    }

    public function show($id)
    {
            return \View::make('admin.users.show')->with('user', Sentry::findUserById($id));
    }

    public function edit($id)
    {
            return \View::make('admin.users.edit')->with('user', Sentry::findUserById($id));
    }

    public function update($id)
    {
        
        $user = Sentry::findUserById($id);
        $user->geolat = Input::get('geolat');
        $user->geolng = Input::get('geolng');

        if ($user->save()) 
        {
            // User information was updated
            Notification::success('User updated successfully.');
        }

        
        if (Input::get('save')) {
            return Redirect::route('admin.users.edit', $user->id);
        }

        if (Input::get('save_and_exit')) {
            return Redirect::route('admin.users.index');
        }
        
    }
 
}