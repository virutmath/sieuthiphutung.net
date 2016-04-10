<?php

class TableAdmin
{
    private $table;
    private $listRecord;
    private $config = [
        'show' => [
            'id' => true
        ],
        'formatDate' => 'd/m/Y',
        'defaultOptionLabel' => '',
        'pageSize' => 30
    ];
    private $arrayFieldShow = [];
    private $editLink = '';
    private $arrayFieldType = [];
    private $arrayLabel = [];
    private $arraySortable = [];
    private $arrayFieldSearch = [];
    private $arrayDropdownOption = [];
    private $i;

    public function __construct($list, $config = [])
    {
        $this->listRecord = $list;
        $this->config = $config;//TODO must add config
        $this->i = 0;
    }

    //pattern should like : (http://)example.com/abc/$field1/$field2...
    public function editLink($pattern) {
        $this->editLink = $pattern;
    }

    public function column($field = '', $label = '', $type = '', $sortable = false, $searchable = false)
    {
        $i = $this->i++;
        //add label of column
        $this->arrayLabel[$i] = $label;
        $this->arraySortable[$i] = !!($sortable);
        $this->arrayFieldSearch[$i] = !!($searchable);
        $this->arrayFieldShow[$i] = $field;
        $this->arrayFieldType[$i] = $type;
    }

    public function columnDropdown($field = '', $label = '', $option = [], $sortable = false, $searchable = false)
    {
        $i = $this->i++;
        //add label of column
        $this->arrayLabel[$i] = $label;
        $this->arraySortable[$i] = !!($sortable);
        $this->arrayFieldSearch[$i] = !!($searchable);
        $this->arrayFieldShow[$i] = $field;
        $this->arrayFieldType[$i] = 'dropdown';
        $this->arrayDropdownOption[$i] = $option;
    }



    private function showHeader()
    {
        return '';
    }

    private function showFooter()
    {
        return '';
    }
    private function parseEditLink($dataObject) {
        $exp = explode('/',$this->editLink);
        $params = [];
        if($exp) {
            foreach($exp as $section) {
                if(starts_with('$',$section)) {
                    $params[] = $section;
                }
            }
        }
        foreach($params as $param) {

        }
    }


    function render()
    {
        $this->render_table();
        return $this->table;
    }

    private function th()
    {
        $str = '<tr>';
        foreach ($this->arrayLabel as $key => $label) {
            $str .= '<th>' . $label . '</th>';
        }
        return $str . '</tr>';
    }

    private function tr($row_data, $record_id)
    {
        $str = '<tr id="ta-tr-' . $record_id . '">';
        foreach ($this->arrayFieldShow as $key => $fieldName) {
            $type = $this->arrayFieldType[$key];
            $value = $type !== 'value' ? $this->prepareFieldName($row_data->$fieldName) : $fieldName;

            switch ($type) {
                case 'checkbox':
                    $str .= '<td class="center">' . $this->generateCheckbox([
                            'name' => 'control-' . $fieldName . '-' . $key,
                            'id' => 'control-' . $fieldName . '-' . $key,
                            'class' => 'form-control iCheck',
                            'value' => $value
                        ]) . '</td>';
                    break;
                case 'datetime':
                    $str .= '<td>' . date($this->config['formatDate'], $value) . '</td>';
                    break;
                case 'value':
                    $str .= '<td>' . $value . '</td>';
                    break;
                case 'dropdown':
                    $str .= '<td>' . $this->generateDropdown([
                            'name' => 'control-' . $fieldName . '-' . $key,
                            'id' => 'control-' . $fieldName . '-' . $key,
                            'class' => 'form-control dropdown',
                            'value' => $value,
                            'option' => $this->arrayDropdownOption[$key]
                        ]) . '</td>';
                    break;
                case 'edit':
                    $str .= '<td class="text-center">
                                '.$this->parseEditLink($row_data).'
                            </td>';
                    break;
                default:
                    $str .= '<td>' . $value . '</td>';
                    break;
            }
        }
        return $str . '</tr>';
    }

    private function prepareFieldName($dataObject, $string = '')
    {
        $arr = explode('.', $string);
        if($arr) {
            foreach ($arr as $property) {
                $dataObject = $dataObject->$property;
            }
        }
        return $dataObject;
    }

    private function render_table()
    {
        $this->table = $this->showHeader();
        $this->table .= '<table class="table table-bordered">';
        $this->table .= $this->th();
        foreach ($this->listRecord as $i => $record) {
            if (property_exists($record, 'id')) {
                $id = $record->id;
            } else {
                $id = $i;
            }
            $this->table .= $this->tr($record, $id);
        }
        $this->table .= '</table>';
        $this->table .= $this->showFooter();
    }

    private function generateCheckbox(array $attribute = [])
    {
        $default = $this->controlDefaultValue();
        $this->extendAttributes($attribute, $default);
        $default['checked'] = $default['value'] ? 'checked' : '';

        return '<div class="list-control-item">
					<input type="checkbox"
							' . $this->defaultControlAttribute($default) . '
							value="' . $default['value'] . '"
							' . $default['checked'] . '/>
				</div>';
    }

    private function defaultOption($label = '', $value = '')
    {
        $label = $label || $this->config['defaultOptionLabel'];
        return '<option value="' . $value . '">' . $label . '</option>';
    }

    private function generateDropdown(array $attribute = [])
    {
        $default = $this->controlDefaultValue();
        $this->extendAttributes($attribute, $default);
        $default['defaultValue'] = isset($default['defaultValue']) ? $default['defaultValue'] : '';
        $opts = $this->defaultOption($default['label'], $default['defaultValue']);
        foreach ($default['option'] as $key => $val) {
            $selected = $default['value'] == $key ? 'selected' : '';
            $opts .= '<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
        }

        return '<div class="list-control-item">
					<select ' . $this->defaultControlAttribute($default) . '>
						' . $opts . '
					</select>
				</div>';
    }

    private function defaultControlAttribute($default)
    {
        return ' name="' . $default['name'] . '" id="' . $default['id'] . '" class="' . $default['class'] . '" ';
    }

    private function extendAttributes($attributes, &$default)
    {
        if (is_array($attributes)) {
            foreach ($default as $key => $val) {
                if (isset($attributes[$key])) {
                    $default[$key] = $attributes[$key];
                    unset($attributes[$key]);
                }
            }
            if (count($attributes) > 0) {
                $default = array_merge($default, $attributes);
            }
        }
        return $default;
    }

    private function controlDefaultValue()
    {
        return [
            'name' => '',
            'id' => '',
            'value' => '',
            'title' => '',
            'class' => ''
        ];
    }
}
