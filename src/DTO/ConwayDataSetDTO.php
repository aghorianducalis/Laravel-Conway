<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 *
 * @property CellSetDTO $dtoSetCell
 * @property CellContactSetDTO $dtoSetCellContact
 * @property StateSetDTO $dtoSetState
 * @property CellStateSetDTO $dtoSetCellState
 */
class ConwayDataSetDTO implements DTO
{
    /** @var CellSetDTO $dtoSetCell */
    public $dtoSetCell;

    /** @var CellContactSetDTO $dtoSetCellContact */
    public $dtoSetCellContact;

    /** @var StateSetDTO $dtoSetState */
    public $dtoSetState;

    /** @var CellStateSetDTO $dtoSetCellState */
    public $dtoSetCellState;

    /**
     * @param CellSetDTO $dtoSetCell
     * @param CellContactSetDTO $dtoSetCellContact
     * @param StateSetDTO $dtoSetState
     * @param CellStateSetDTO $dtoSetCellState
     */
    public function __construct(
        CellSetDTO $dtoSetCell,
        CellContactSetDTO $dtoSetCellContact,
        StateSetDTO $dtoSetState,
        CellStateSetDTO $dtoSetCellState
    )
    {
        $this->dtoSetCell = $dtoSetCell;
        $this->dtoSetCellContact = $dtoSetCellContact;
        $this->dtoSetState = $dtoSetState;
        $this->dtoSetCellState = $dtoSetCellState;
    }

    // inputDataLogic
    public function generateConditions()
    {
        /*

        // якщо в живої клітини один чи немає живих сусідів – то вона помирає від «самотності»;
        // якщо в живої клітини два чи три живих сусіди – то вона лишається жити;
        // якщо в живої клітини чотири та більше живих сусідів – вона помирає від «перенаселення»;
        // якщо в мертвої клітини рівно три живих сусіди – то вона оживає.

        $result = 0;

        if ($cellStateA === 0) {
            if ($neighbourStateCount === 3) {
                $result = 1;
            }
        } elseif ($cellStateA === 1) {
            if ($neighbourStateCount < 2) {
                $result = 0;
            } elseif (
                $neighbourStateCount === 2 ||
                $neighbourStateCount === 3
            ) {
                $result = 1;
            } else {
                $result = 0;
            }
        } else {
            $result = 0;
        }*/

//        return $result;
    }
}
