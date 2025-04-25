<?php

namespace App\Enum;

enum StatusTarefa: string
{
    case PENDENTE = 'pendente';
    case EM_ANDAMENTO = 'em andamento';
    case CONCLUIDA = 'concluida';

    public function label(): string
    {
        return match ($this) {
            self::PENDENTE => 'Pendente',
            self::EM_ANDAMENTO => 'Em Andamento',
            self::CONCLUIDA => 'Concluída',
        };
    }
}