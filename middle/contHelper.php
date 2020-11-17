<?php


class ContHelper {
    public static function getRequestingUsers($user){
        $pendingRequestIDs = FriendshipDB::getPendingRequests($user);
        $requestingUsers = array();
        for($i = 0; $i < count($pendingRequestIDs); $i++){
            array_push($requestingUsers, UserDB::getUser($pendingRequestIDs[$i]));
        } 
        return $requestingUsers;
    }
}
