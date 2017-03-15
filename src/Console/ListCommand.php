<?php namespace ABENEVAUT\Themes\Console;

use Illuminate\Console\Command;

/**
 * Class ListCommand
 * @package ABENEVAUT\Themes\Console
 */
class ListCommand extends Command
{

    /**
     * Command name.
     *
     * @var string
     */
    protected $name = 'theme:list';

    /**
     * Command description.
     *
     * @var string
     */
    protected $description = 'Show the available themes';

    /**
     * Execute command.
     */
    public function fire()
    {
        $this->table(['Name', 'Path', 'Enabled', 'Active'], $this->getRows());
    }

    /**
     * Get table rows.
     *
     * @return array
     */
    public function getRows()
    {
        $rows = [];

        $themes = $this->laravel['themes']->all();

        foreach ($themes as $theme) {
            $rows[] = [
                $theme->getName(),
                $theme->getPath(),
                $theme->enabled() ? 'Yes' : 'No',
                $theme->isActive() ? 'Yes' : 'No',
            ];
        }

        return $rows;
    }

}
