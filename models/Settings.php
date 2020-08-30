<?php
namespace Bauboo\YouTube\Models;

use Model;
use October\Rain\Database\Traits\Validation as ValidationTrait;

/**
 * Settings Model
 */
class Settings extends Model
{
    use ValidationTrait;

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'Bauboo_YouTube_Settings';

    public $settingsFields = 'fields.yaml';

    public $rules = [];
}
