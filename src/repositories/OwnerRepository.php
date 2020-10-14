<?php

namespace src\repositories;

use src\entities\Owner;

class OwnerRepository
{
    /**
     * @param $id
     * @return Owner|null
     */
    public function get($id): ?Owner
    {
        return Owner::findOne($id);
    }

    /**
     * @param Owner $owner
     */
    public function save(Owner $owner): void
    {
        if (!$owner->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    /**
     * @param Owner $owner
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function remove(Owner $owner): void
    {
        if (!$owner->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}
