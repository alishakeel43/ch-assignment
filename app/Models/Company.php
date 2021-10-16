<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model {
    use HasFactory;

    // Mass assignment
    protected $guarded = [];

    /**
     * search companies with name root domain count or domain authority if the parameters are not found then
     * whole records will be return
     *
     * @param array $data
     */
    public function scopeSearchCompanies( $query, array $data = [] ) {
//        DB::
//        dd($data);
        if ( !empty( $data ) ) {
            if ( !empty( $data['name'] ) ) {
                $query->where( 'root_domain', 'LIKE', '%' . $data['name'] . '%' );
            }
            if ( !empty( $data['root_domain_count'] ) ) {
//                CONVERT(varchar(20), emp_id) LIKE '1%'
                $query->where( DB::raw("CONVERT(linking_root_domains, CHAR)"), 'LIKE', '%' . $data['root_domain_count'] .'%' );
//                $query->where( 'linking_root_domains', 'LIKE', '%' . $data['root_domain_count'] );
            }
            if ( !empty( $data['domain_authority'] ) ) {
                $query->where( 'domain_authority',$data['domain_authority'] );
            }
//            dd($query->toSql());
            return $query;
        } else {
            return $query;
        }
    }

}
