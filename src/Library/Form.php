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
        $settings = $this->settings;
        unset($this->settings);

        if(isset($settings['type']))
            switch ($settings['type']){

                case 'check' :

                    $view = 'cmscore::library.form.inputs.check';
                    break;

                case 'email' :
                    $view = 'cmscore::library.form.inputs.email';
                    break;

                case 'password' :
                    $view = 'cmscore::library.form.inputs.password';
                    break;

                case 'text' :
                    $view = 'cmscore::library.form.inputs.text';
                    break;

                default :
                    return abort(404, 'input:Type not found');
                    break;
            }

        if(isset($view)){
            return view($view)->with($settings);
        }

        return abort(404, 'Forms class: No view found');
    }
}
