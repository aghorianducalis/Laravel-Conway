<?php

namespace Babylon\Repositories;

use App\Models\Cell;
use App\Models\CellContact;
use App\Models\CellState;
use App\Models\State;
use Babylon\DTO\CellSetDTO;
use Babylon\DTO\ConwayDataSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;
use Babylon\Interfaces\Repositories\Repository;

class ConwayDataSetRepository implements Repository
{
    /**
     * @param $id
     * @return ConwayDataSetDTO
     */
    public function getDTO($id): ConwayDataSetDTO
    {
        // init repositories

        /** @var \Babylon\Repositories\CellRepository $cellRepository */
        $cellRepository = resolve(CellRepository::class);

        /** @var \Babylon\Repositories\CellContactRepository $cellContactRepository */
        $cellContactRepository = resolve(CellContactRepository::class);

        /** @var \Babylon\Repositories\StateRepository $stateRepository */
        $stateRepository = resolve(StateRepository::class);

        /** @var \Babylon\Repositories\CellStateRepository $cellStateRepository */
        $cellStateRepository = resolve(CellStateRepository::class);


        // data: get dto sets from repositories

        // todo move this to factory/seeder
        $cellIds = Cell::query()->select(['id'])->get()->pluck(['id'])->toArray();
        $cellContactIds = CellContact::query()->select(['id'])->get()->pluck(['id'])->toArray();
        $stateIds = State::query()->select(['id'])->get()->pluck(['id'])->toArray();
        $cellStateIds = CellState::query()->select(['id'])->get()->pluck(['id'])->toArray();

        /** @var \Babylon\DTO\CellSetDTO dtoSetCell */
        $dtoSetCell = $cellRepository->getDTOSet($cellIds);

        /** @var \Babylon\DTO\CellContactDTO dtoSetCellContact */
        $dtoSetCellContact = $cellContactRepository->getDTOSet($cellContactIds);

        /** @var \Babylon\DTO\StateSetDTO $dtoSetState */
        $dtoSetState = $stateRepository->getDTOSet($stateIds);

        /** @var \Babylon\DTO\CellStateSetDTO $dtoSetCellState */
        $dtoSetCellState = $cellStateRepository->getDTOSet($cellStateIds);

        $dto = new ConwayDataSetDTO(
            $dtoSetCell,
            $dtoSetCellContact,
            $dtoSetState,
            $dtoSetCellState
        );

        return $dto;
    }

    /**
     * @param array $ids
     * @return array|DTO[]
     */
    public function getDTOSet(array $ids = []): array
    {
        $dtoSet = [];

        foreach ($ids as $id) {
            $dto = $this->getDTO($id);

            $dtoSet[] = $dto;
        }

        return $dtoSet;
    }

    /**
     * @param DTO|ConwayDataSetDTO $entity
     * @return void
     */
    public function saveEntity(DTO $entity): void
    {
        if (get_class($entity) === ConwayDataSetDTO::class) {


            // data: get dto sets from data set object

            /** @var \Babylon\DTO\CellSetDTO dtoSetCell */
            $dtoSetCell = $entity->dtoSetCell;

            /** @var \Babylon\DTO\CellContactDTO dtoSetCellContact */
            $dtoSetCellContact = $entity->dtoSetCellContact;

            /** @var \Babylon\DTO\StateSetDTO $dtoSetState */
            $dtoSetState = $entity->dtoSetState;

            /** @var \Babylon\DTO\CellStateSetDTO $dtoSetCellState */
            $dtoSetCellState = $entity->dtoSetCellState;


            // init repositories

            /** @var \Babylon\Repositories\CellRepository $cellRepository */
            $cellRepository = resolve(CellRepository::class);

            /** @var \Babylon\Repositories\CellContactRepository $cellContactRepository */
            $cellContactRepository = resolve(CellContactRepository::class);

            /** @var \Babylon\Repositories\StateRepository $stateRepository */
            $stateRepository = resolve(StateRepository::class);

            /** @var \Babylon\Repositories\CellStateRepository $cellStateRepository */
            $cellStateRepository = resolve(CellStateRepository::class);


            // call repositories' methods to save the data set

            $cellRepository->saveEntitySet($dtoSetCell);
            $cellContactRepository->saveEntitySet($dtoSetCellContact);
            $stateRepository->saveEntitySet($dtoSetState);
            $cellStateRepository->saveEntitySet($dtoSetCellState);

        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param DTO|CellSetDTO $entitySet
     * @return void
     */
    public function saveEntitySet(DTO $entitySet): void
    {
        //
    }

    /**
     * @param Manifold|Cell $entity
     * @return DTO|ConwayDataSetDTO
     */
    public static function toDTO(Manifold $entity): DTO
    {
        $dto = new ConwayDataSetDTO(
            $entity->getAttribute('id'),
            $entity->getAttribute('ct'),
            $entity->getAttribute('x'),
            $entity->getAttribute('y'),
            $entity->getAttribute('z')
        );

        return $dto;
    }

    /**
     * @param DTO|ConwayDataSetDTO $entity
     * @return Manifold|Cell
     */
    public static function toManifold(DTO $entity): Manifold
    {
        $data = [
            'id' => $entity->id,
            'ct' => $entity->ct,
            'x' => $entity->x,
            'y' => $entity->y,
            'z' => $entity->z,
        ];

        $object = new Manif;

        return $object;
    }
}
