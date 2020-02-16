<?php


namespace Ministrare\Cmscore\Library;

class Form
{
    private $settings = [];

    /**
     * @param $type
     * @param null $name
     * @return $this
     */
    public function input($type, $name = null)
    {
        $this->settings['type'] = $type;
        if(isset($name)){
            $this->settings['name'] = $name;
            $this->settings['slug'] = Utilities::createSlug($name);
        }

        return $this;
    }

    /**
     * @param $name
     * @return Form
     */
    public function setName($name)
    {
        $this->settings['name'] = $name;
        $this->settings['slug'] = Utilities::createSlug($name);

        return $this;
    }

    /**
     * @param $name
     * @return Form
     */
    public function setSlug($name)
    {
        $this->settings['slug'] = Utilities::createSlug($name);

        return $this;
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function options(array $options)
    {
        $settings = [];
        foreach($options as $optionKey => $optionValue)
        {
            $settings[$optionKey] = $optionValue;
        }

        $this->settings += $settings;

        return $this;
    }


    public function render()
    {
        switch ($this->settings['type']){
            case 'text' :
                $view = 'cmscore::library.form.inputs.text';
            break;

            case 'email' :
                $view = 'cmscore::library.form.inputs.email';
            break;
        }

        $settings = $this->settings;
        unset($this->settings);

        if(isset($view)){
            return view($view)->with($settings);
        }

        return abort(404, 'input:Type not found');
    }
}
