<?php

namespace Acrossoffwest\Zoom\Classes;

use Acrossoffwest\Zoom\Http\Request;


/**
 * Class Users
 * @package Acrossoffwest\Zoom\Classes
 *
 */
class Users extends Request
{

    /**
     * Create
     *
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        return $this->post('users', $data);
    }

    /**
     * Get Users
     *
     * @param array $queryParameters
     * @return array
     */
    public function list(array $queryParameters = []) : array
    {
        return $this->get('users', $queryParameters);
    }

    /**
     * Get users page
     *
     * @param int $page
     * @param array $queryParameters
     * @return array
     */
    public function getPage(int $page = 1, array $queryParameters = []) : array
    {
        return $this->list(array_merge([
            'page_number' => $page
        ], $queryParameters));
    }

    /**
     * Get users pages count
     *
     * @param int $perPage
     * @param array $queryParameters
     * @return int
     */
    public function getPagesCount(int $perPage = 30, array $queryParameters = []) : int
    {
        ['page_count' => $pageCount] = $this->list(array_merge([
            'page_size' => $perPage
        ], $queryParameters));

        return $pageCount;
    }

    /**
     * Get users count
     *
     * @param array $queryParameters
     * @return int
     */
    public function count(array $queryParameters = []) : int
    {
        ['page_count' => $pageCount] = $this->list(array_merge([
            'page_size' => 1
        ], $queryParameters));

        return $pageCount;
    }

    /**
     * Update
     *
     * @param string $userId
     * @param array $data
     * @return array|mixed
     */
    public function update(string $userId, array $data)
    {
        return $this->patch("users/{$userId}", $data);
    }

    /**
     * Retrieve
     *
     * @param string $userId
     * @param array $optional
     * @return array|mixed
     */
    public function retrieve(string $userId, $optional = [])
    {
        return $this->get("users/{$userId}", $optional);
    }

    /**
     * Retrieve token
     *
     * @param string $userId
     * @param array $optional
     * @return array|mixed
     */
    public function retrieveToken(string $userId, $optional = [])
    {
        return $this->get("users/{$userId}/token", $optional);
    }

    /**
     * Remove
     *
     * @param string $userId
     * @return array|mixed
     */
    public function remove(string $userId)
    {
        return $this->delete("users/{$userId}");
    }

    /**
     * Users Assistants List
     *
     * @param string $userId
     * @return array|mixed
     */
    public function assistantsList(string $userId)
    {
        return $this->get("users/{$userId}/assistants");
    }

    /**
     * Add Assistant
     *
     * @param string $userId
     * @param array $data
     * @return array|mixed
     */
    public function addAssistant(string $userId, array $data)
    {
        return $this->post("users{$userId}/assistants", $data);
    }

    /**
     * Delete Assistants
     *
     * @param string $userId
     * @return array|mixed
     */
    public function deleteAssistants(string $userId)
    {
        return $this->delete("users/{$userId}/assistants");
    }

    /**
     * Delete Assistant
     *
     * @param string $userId
     * @param string $assistantId
     * @return array|mixed
     */
    public function deleteAssistant(string $userId, string $assistantId)
    {
        return $this->delete("users/{$userId}/assistants/{$assistantId}");
    }

    /**
     * Schedulers List
     *
     * @param string $userId
     * @return array|mixed
     */
    public function schedulersList(string $userId)
    {
        return $this->get("users/{$userId}/schedulers");
    }

    /**
     * Deletes Schedulers
     *
     * @param string $userId
     * @return array|mixed
     */
    public function deletesSchedulers(string $userId)
    {
        return $this->delete("users/{$userId}/schedulers");
    }

    /**
     * Deletes Scheduler
     *
     * @param string $userId
     * @param string $schedulerId
     * @return array|mixed
     */
    public function deletesScheduler(string $userId, string $schedulerId)
    {
        return $this->delete("users/{$userId}/schedulers/{$schedulerId}");
    }

}