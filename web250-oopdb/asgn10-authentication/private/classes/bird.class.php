<?php

class Bird extends DatabaseObject
{

  // Active record code

  static protected $table_name = 'birds';
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $nest_placement;
  public $behavior;
  public $conservation_id;
  public $backyard_tips;

  /*
  Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
  Use the CONDITION_OPTIONS from the bicycle.class.php file

  1 = Low concern
  2 = Moderate concern
  3 = Extreme concern
  4 = Extinct
  */

  public const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  public const FOOD_OPTIONS = [
    1 => 'Insects',
    2 => 'Nectar',
    3 => 'Omnivore',
    4 => 'Carnivore'
  ];

  /*
   - Create a public __construct that accepts a list of $args[]
   - Use the Null coalescing operator
   - Create a default value of 1 for conservation_id
 */

  public function name()
  {
    return "{$this->common_name}";
  }

  public function habitat()
  {
    return "{$this->habitat}";
  }

  public function tips()
  {
    return "{$this->backyard_tips}";
  }

  public function display_food()
  {
    return "{$this->food}";
  }

  public function __construct($args = [])
  {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nest_placement = $args['nest_placement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? 1;
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }

  /*
  Create a public method called conservation(). This method should mimic the public function condition() from the bicycle.class.php file
*/

  public function conservation()
  {
    if ($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "unknown";
    }
  }

  public function food()
  {
    if ($this->food > 0) {
      return self::FOOD_OPTIONS[$this->food];
    } else {
      return "unknown";
    }
  }

  protected function validate()
  {
    $this->errors = [];
    if (is_blank($this->common_name)) {
      $this->errors['common_name'] = 'Common name cannot be blank.';
    }
    if (is_blank($this->habitat)) {
      $this->errors['habitat'] = 'Habitat cannot be blank.';
    }
    if (is_blank($this->food)) {
      $this->errors['food'] = 'Food cannot be blank.';
    }
    return $this->errors;
  }
}
