<?php

namespace App;

use Exception;

trait ResourcesTrait
{
    public function storeResource($modelClassName, array $attributes)
    {
        try {
            $store = $modelClassName::create($attributes);

            if (!$store) {
                session()->flash('error', 'Saving request type failed!');
            }

            session()->flash('success', 'Saving request type successful!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function updateModel($modelClassName, array $attributes)
    {
        try {
            $instance = $modelClassName::where('hash', $this->hash)->first();

            if (!$instance) {
                session()->flash('error', 'Data do not exist!');
                return;
            }

            $update = $instance->update($attributes);

            if (!$update) {
                session()->flash('error', 'Updating data failed!');
                return;
            }

            session()->flash('success', 'Updating data successful!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
