<?php namespace Illuminate\Contracts\Auth;

interface UserProvider {

	/**
	 * Retrieve a User by their unique identifier.
	 *
	 * @param  mixed  $identifier
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveById($identifier);

	/**
	 * Retrieve a User by by their unique identifier and "remember me" token.
	 *
	 * @param  mixed   $identifier
	 * @param  string  $token
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveByToken($identifier, $token);

	/**
	 * Update the "remember me" token for the given User in storage.
	 *
	 * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
	 * @param  string  $token
	 * @return void
	 */
	public function updateRememberToken(Authenticatable $user, $token);

	/**
	 * Retrieve a User by the given credentials.
	 *
	 * @param  array  $credentials
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveByCredentials(array $credentials);

	/**
	 * Validate a User against the given credentials.
	 *
	 * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
	 * @param  array  $credentials
	 * @return bool
	 */
	public function validateCredentials(Authenticatable $user, array $credentials);

}
