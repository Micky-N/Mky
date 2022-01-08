<?php


namespace Tests\App\Permission;


use Core\Exceptions\Voter\VoterException;
use Core\Interfaces\VoterInterface;
use RuntimeException;

class SellerVoter implements VoterInterface
{
    const EDIT = 'edit_product';

    public function canVote(string $permission, $subject = null): bool
    {
        return ($permission === self::EDIT) && ($subject instanceof TestProduct);
    }

    public function vote($user, string $permission, $subject = null): bool
    {
        return $subject->getSeller() === $user;
    }
}