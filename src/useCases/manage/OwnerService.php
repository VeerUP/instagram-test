<?php

namespace src\useCases\manage;

use src\entities\Owner;
use src\forms\manage\OwnerForm;
use src\repositories\OwnerRepository;

class OwnerService
{
    /**
     * @var OwnerRepository
     */
    private OwnerRepository $owner;

    /**
     * OwnerService constructor.
     * @param OwnerRepository $owner
     */
    public function __construct(OwnerRepository $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @param OwnerForm $form
     * @return Owner
     */
    public function create(OwnerForm $form): Owner
    {
        $owner = Owner::create($form->username);
        $this->owner->save($owner);
        return $owner;
    }

    /**
     * @param $id
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function remove($id): void
    {
        if ($owner = $this->owner->get($id)) {
            $this->owner->remove($owner);
        }
    }
}
