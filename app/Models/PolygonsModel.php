<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonsModel extends Model
{
    protected $table = 'polygons';

    protected $guarded = ['id'];

    public function gejson_polygons()
    {
        $polygons = $this
            ->select(DB::raw('
                id,
                ST_AsGeoJson(geom) AS geom,
                ST_Area(geom, true)::float AS area_m2,
                (ST_Area(geom, true)/1000000)::float AS area_km2,
                (ST_Area(geom, true)/10000)::float AS area_hectare,
                name,
                description,
                created_at,
                updated_at,
                image
            '))
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    "name" => $p->name,
                    'description' => $p->description,
                    'area_m2' => $p->area_m2,
                    'area_km2' => $p->area_km2,
                    'area_hectare' => $p->area_hectare,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }

    public function gejson_polygon($id)
    {
        $polygons = $this
            ->select(DB::raw('
                id,
                ST_AsGeoJson(geom) AS geom,
                ST_Area(geom, true)::float AS area_m2,
                (ST_Area(geom, true)/1000000)::float AS area_km2,
                (ST_Area(geom, true)/10000)::float AS area_hectare,
                name,
                description,
                created_at,
                updated_at,
                image
            '))
            ->where('id', $id)
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    "name" => $p->name,
                    'description' => $p->description,
                    'area_m2' => $p->area_m2,
                    'area_km2' => $p->area_km2,
                    'area_hectare' => $p->area_hectare,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                ],
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;
    }
}
