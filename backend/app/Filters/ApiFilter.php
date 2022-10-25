<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class  ApiFilter
{
    protected $safeParms = [];

    protected $columMap = [];
    protected $operatorMap = [];
    public function transform(Request $request)
    {
        $eloquery = [];
        // return $request->query($parm);
        foreach ($this->safeParms as $parm => $operatorMap) {
            // $request->query($parm);
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }
            $colum = $this->columMap[$parm] ?? $parm;
            foreach ($operatorMap  as $operator) {
                if (isset($query[$operator])) {
                    if ($operator == 'like') {
                        $eloquery[] = [$colum, $this->operatorMap[$operator], '%' . $query[$operator] . '%'];
                    } else {
                        $eloquery[] = [$colum, $this->operatorMap[$operator], $query[$operator]];
                    }
                }
            }
        }
        return $eloquery;
    }
}
