<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class VilleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ville::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Ville::truncate();
        $array = ["DEDOUGOU", "BANFORA", "BOBO DIOULASSO", "HOUNDE", "OUAGADOUGOU", "OUAHIGOUYA", "KOUDOUGOU", "ZORGHO","ZINIARE","YAKO","TENKODOGO","TOUGAN","SEGUENEGA","POUYTENGA","POURA","PO","PENI","ORODARA","NOUNA","NIASSAN","NANGOLOGO","NDOROLA","NANORO","MANGA","LEO","KOUROUMA","KOUPELA","KONGOUSSI","KOMPIENGA","KOMBISSIRI","KAYA","KARANGASSO VIGUE","GOROM GOROM","GARANGO","GAOUA","FADA NGOURMA","DORI","DJIBO","DIEBOUGO","DIAPAGA","DI","DARSLAMAI","DANO","DANDE","DAKOLA","CINKANCE","BOGANDE","BITTOU","BEREGADOUGOU","BAGRE"];

        return [
            'id' => $this->faker->unique()->uuid,
            'nom' => $this->faker->unique()->randomElement($array),
        ];
    }
}
