<?php

namespace src\readModels;

use src\entities\Owner;

class OwnerReadRepository
{
    /**
     * @return Owner[]
     */
    public function getAll(): array
    {
        return Owner::find()->all();
    }
}
