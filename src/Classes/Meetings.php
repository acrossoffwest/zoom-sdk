<?php


namespace Acrossoffwest\Zoom\Classes;

use Acrossoffwest\Zoom\Http\Request;

class Meetings extends Request
{
    /**
     * List
     *
     * @param string $userId
     * @return array|mixed
     */
    public function list(string $userId, array $queryParameters = [])
    {
        return $this->get("users/{$userId}/meetings", $queryParameters);
    }

    /**
     * Get users page
     *
     * @param int $page
     * @param array $queryParameters
     * @return array
     */
    public function getPage(string $userId, int $page = 1, array $queryParameters = []) : array
    {
        return $this->list($userId, array_merge([
            'page_number' => $page
        ], $queryParameters));
    }

    /**
     * Delete
     *
     * @param string $id
     * @return array|mixed
     */
    public function deleteItem(string $id)
    {
        return $this->delete("meetings/{$id}");
    }

    /**
     * Update status
     *
     * @param string $id
     * @return array|mixed
     */
    public function updateStatus(string $id, string $action)
    {
        return $this->put("meetings/{$id}/status", [
            'action' => $action
        ]);
    }

    /**
     * Complete meeting
     *
     * @param string $id
     * @return array|mixed
     */
    public function complete(string $id)
    {
        return $this->updateStatus($id, 'end');
    }

    public function addRegistrant(string $meetingId, array $registrantData)
    {
        $errorMsg = 'The {field} field is required';
        if (empty($registrantData['email'])) {
            throw new \Exception(str_replace('{field}', '"email"', $errorMsg));
        }

        if (empty($registrantData['first_name'])) {
            $registrantData['first_name'] = 'Noname';
        }

        if (empty($registrantData['last_name'])) {
            $registrantData['last_name'] = 'Noname';
        }

        return $this->post("meetings/".$meetingId."/registrants", $registrantData);
    }

    /**
     * Create
     *
     * @param string $userId
     * @param array $data
     * @return array|mixed
     */
    public function create(string $userId, array $data  = null)
    {
        return $this->post("users/{$userId}/meetings", $data);
    }

    /**
     * Meeting
     *
     * @param string $meetingId
     * @return array|mixed
     */
    public function meeting(string $meetingId)
    {
        return $this->get("meetings/{$meetingId}");
    }

    /**
     * Records
     *
     * @param string $meetingId
     * @return array|mixed
     */
    public function records(string $meetingId)
    {
        return $this->get("meetings/{$meetingId}/recordings");
    }

}