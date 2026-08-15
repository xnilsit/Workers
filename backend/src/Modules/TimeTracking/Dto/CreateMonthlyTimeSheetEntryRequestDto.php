<?php declare(strict_types=1);

namespace App\Modules\TimeTracking\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class CreateMonthlyTimeSheetEntryRequestDto
{
    #[Assert\NotBlank]
    #[Assert\Range(min: 1, max: 31)]
    public ?int $day = null;

    #[Assert\When(
        expression: 'this.type === null',
        constraints: [new Assert\NotBlank],
    )]
    public ?string $start = null;

    #[Assert\When(
        expression: 'this.type === null',
        constraints: [
            new Assert\NotBlank,
            new Assert\GreaterThanOrEqual(0),
        ],
    )]
    public ?int $breakDuration = null;

    #[Assert\When(
        expression: 'this.type === null',
        constraints: [new Assert\NotBlank],
    )]
    public ?string $end = null;

    #[Assert\When(
        expression: 'this.start === null && this.breakDuration === null && this.end === null',
        constraints: [new Assert\NotBlank],
    )]
    #[Assert\When(
        expression: 'this.type !== null',
        constraints: [new Assert\Choice(choices: [2, 3, 4])],
    )]
    public ?int $type = null;
}
