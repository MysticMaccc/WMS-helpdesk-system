<?php

namespace App;

use Exception;

trait ResourcesTrait
{
    public function storeResource($modelClassName, array $attributes, $exceptionMsg = null)
    {
        try {
            $store = $modelClassName::create($attributes);

            if (!$store) {
                session()->flash('error', 'Saving data failed!');
            }

            session()->flash('success', 'Saving data successful!');
        } catch (Exception $e) {
            session()->flash('error', $exceptionMsg != null ? $exceptionMsg : $e->getMessage());
        }
    }

    public function updateResource($modelClassName, array $attributes)
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

    public function destroyResource($modelClassName, $hashValue)
    {
        try {
            $destroy = $modelClassName::where('hash', '=', $hashValue)->first()->update([
                'is_active' => 0
            ]);

            if (!$destroy) {
                session()->flash('error', 'Deleting data failed!');
                return;
            }

            session()->flash('success', 'Deleting data successful!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function hardDestroyResource($modelClassName, $hashValue)
    {
        try {
            $destroy = $modelClassName::where('hash', '=', $hashValue)->first()->delete();

            if (!$destroy) {
                session()->flash('error', 'Deleting data failed!');
                return;
            }

            session()->flash('success', 'Deleting data successful!');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
