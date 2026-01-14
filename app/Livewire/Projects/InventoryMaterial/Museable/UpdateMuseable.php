<?php

namespace App\Livewire\Projects\InventoryMaterial\Museable;

use App\Http\Requests\StoreMaterialRequest;
use App\Models\Ceramic;
use App\Models\Material;
use App\Models\Project;
use Livewire\Component;

class UpdateMuseable extends Component
{
    public $project_id;
    public $material;

    public $ue, $object, $century, $class, $fragments, $form, $piece_percentage, $thickness;
    public $pasta, $decoration, $material_type;

    public $side_max, $side_min, $notes;
    public $height, $diameter_base, $diameter_mouth, $diameter_max, $description;
    public $changeType = '';

    public function rules(){
        return (new StoreMaterialRequest())->rules($this->material_type);
    }

    protected $listeners = ['updateMaterialId'];

    public function updateMaterialId($newId){
        $this->load($newId);
    }

    public function load(string $materialId)
    {
        $this->material = Material::find($materialId);

        $this->ue = $this->material->ue;
        $this->object = $this->material->object;
        $this->century = $this->material->century;
        $this->class = $this->material->class;
        $this->fragments = $this->material->fragments;
        $this->form = $this->material->form;
        $this->piece_percentage = $this->material->piece_percentage;
        $this->thickness = $this->material->thickness;
        $this->pasta = $this->material->pasta;
        $this->decoration = $this->material->decoration;
        $this->material_type = $this->material->material_type;

        $this->project_id = $this->material->project_id;

        if(strcmp($this->material_type, Material::MATERIAL_TYPE_CERAMIC) == 0){
            $this->changeType = Material::MATERIAL_TYPE_CERAMIC;
            $ceramic = $this->material->ceramic;
            $this->height = $ceramic->height;
            $this->diameter_base = $ceramic->diameter_base;
            $this->diameter_max = $ceramic->diameter_max;
            $this->diameter_mouth = $ceramic->diameter_mouth;
            $this->description = $ceramic->description;
        } else {
            $this->changeType = Material::MATERIAL_TYPE_TILE;
            if($this->material->tile){
                $tile = $this->material->tile;
                $this->side_max = $tile->side_max;
                $this->side_min = $tile->side_min;
                $this->notes = $tile->notes;
            }
        }
    }

    public function mount(string $materialId)
    {
        $this->load($materialId);
    }

    public function updateMaterial()
    {
        $validatedData = $this->validate();
        $this->material->update($validatedData);

        if(strcmp($this->material_type, Material::MATERIAL_TYPE_CERAMIC) == 0){
            $ceramic = $this->material->ceramic;
            $ceramic->height = $this->height;
            $ceramic->diameter_base = $this->diameter_base;
            $ceramic->diameter_max = $this->diameter_max;
            $ceramic->diameter_mouth = $this->diameter_mouth;
            $ceramic->description = $this->description;

            $ceramic->update();
        } else {
            $tile = $this->material->tile;
            $tile->side_max = $this->side_max;
            $tile->side_min = $this->side_min;
            $tile->notes = $this->notes;
            $tile->update();
        }

        $this->dispatch('museable-remain-clear-search');
        $this->dispatch('closeUpdateMuseable');

        $this->dispatch('show_alert', type: 'success', message: 'Se actualizo el material');
    }

    public function render()
    {
        $ues = Project::find($this->project_id)->allUes();
        return view('livewire.projects.inventory-material.museable.update-museable', compact('ues'));
    }
}
