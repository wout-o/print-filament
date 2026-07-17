<?php

use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Livewire\Component;
use Livewire\Livewire;
use PrintFilament\Print\Infolists\Components\PrintComponent;

class InfolistWithPrintComponent extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public function infolist(Schema $schema): Schema
    {
        return $schema->components([
            PrintComponent::make('print_page')->label('Print Page'),
        ]);
    }

    public function render(): string
    {
        return '<div>{{ $this->infolist }}</div>';
    }
}

it('renders the print button inside an infolist', function () {
    Livewire::test(InfolistWithPrintComponent::class)
        ->assertSeeHtml('id="print-button"')
        ->assertSeeHtml('window.print()')
        ->assertSee('Print Page');
});

it('applies the configured button classes', function () {
    Livewire::test(InfolistWithPrintComponent::class)
        ->assertSeeHtml('fi-btn');
});
