<?php

namespace Database\Seeders;

use App\Models\DaftarMaterial;
use App\Models\DaftarMr;
use App\Models\DaftarPo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftarMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = new DaftarMaterial();
        $materials->fill([
            "material_name" => "Pole 7/250",
            "part_num" => "PL000002T",
            "uom" => "EA",
        ]);
        $materials->save();

        $material = new DaftarMaterial();
        $material->fill([
            "material_name" => "Pole 7/200",
            "part_num" => "PL000002TE",
            "uom" => "EA",
        ]);
        $material->save();

        $data = [
            [
                "id_mr" => "MR-0001-302032",
                "no_po" => "PO_1-XII-2023-00001",
                "po_name" => "Sindang barat 1 unik",
                "part_num" => ["PL000002T", "PL000002TE"],
                "qty_plan" => [23, 40],
                "assignment" => "Nama Admin Costing",
                "date_assign" => "2023/12/4",
                "status_approval" => "Waiting Approval",
                "status_mr" => "N/Y Release",
            ],
        ];

        foreach ($data as $record) {
            $partNumbers = $record["part_num"];
            $qtyPlans = $record["qty_plan"];

            foreach (array_map(null, $partNumbers, $qtyPlans) as [$partNumber, $qtyPlan]) {
                $input_mr = new DaftarMr();
                $input_mr->fill([
                    "id_mr" => $record["id_mr"],
                    "no_po" => $record["no_po"],
                    "part_num" => $partNumber,
                    "qty_plan" => $qtyPlan,
                    "assignment" => $record["assignment"],
                    "date_assign" => $record["date_assign"],
                    "status_approval" => $record["status_approval"],
                    "status_mr" => $record["status_mr"],
                ]);
                $input_mr->save();
            }

            $numberpo = new DaftarPo();
            $numberpo->fill([
                "id_mr" => $record["id_mr"],
                "no_po" => $record["no_po"],
                "po_name" => $record["po_name"],
                "total_material" => 63,
                "assignment" => $record["assignment"],
                "date_assign" => $record["date_assign"],
                "status_approval" => $record["status_approval"],
                "status_mr" => $record["status_mr"],
            ]);
            $numberpo->save();

        }
    }
}
