<?php

namespace Structural\DataMapper;

class DataMapper
{
    /**
     * @var StorageManager
     */
    private $storageManager;

    public function __construct(StorageManager $storageManager)
    {
        $this->storageManager = $storageManager;
    }

    public function findByID(string $id)
    {
        return $this->storageManager->find($id);
    }

    public function saveUser(User $user)
    {
        return $this->storageManager->save([
            $user->getId() => [
                'userName' => $user->getUserName(),
                'password' => $user->getPassword()
            ]
        ]);
    }
}
