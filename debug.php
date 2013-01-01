<?php
/**
 * This file is distributed under the MIT Open Source
 * License. See README.MD for details.
 * @author Ioan CHIRIAC
 */
/**
 * Cute debugging function (with html & css) and limited levels of objects
 * @param mixed $var The varinstance to be analyzed
 * @param integer $nested The maximum nested level of objects introspection
 * @return string
 */
function var_debug( $var, $nested = 2 ) {
    static $css;
    $prefix = null;
    if ( !$css ) {
        $prefix = '<style type="text/css">' . file_get_contents(__DIR__ . '/debug.css').'</style>';
        $prefix .= '<script type="text/javascript">' . file_get_contents(__DIR__ . '/debug.js').'</script>';
        $css = true;
    }
    if ( is_null($var) ) {
        return $prefix . '<span class="dbg-kw dbg-null">NULL</span>';
    } elseif ( is_bool($var) ) {
        return $prefix . '<span class="dbg-kw dbg-bool">boolean(<em>'.($var?'true':'false').'</em>)</span>';
    } elseif ( is_string($var) ) {
        $var = utf8_decode($var);
        return $prefix . '<span class="dbg-kw dbg-str">string(<em>' . strlen($var) . '</em>) <span>"'.
            str_replace(
                array("\t", "\n", "\r", ' '), 
                array(
                    '<strong>\\t</strong>',
                    '<strong>\\n</strong>',
                    '<strong>\\r</strong>',
                    '<em>&middot;</em>'
                ), 
                
                htmlentities(
                    strlen($var) > 100 ?
                    substr($var, 0, 50) 
                    . '[...]'
                    . substr($var, -50)
                    : $var
                )
            )
        .'"</span></span>';
    } elseif ( is_numeric($var) ) {
        return $prefix . '<span class="dbg-kw dbg-num">num(<span>'.$var.'</span>)</span>';
    } elseif ( is_array($var) ) {
        $ret = $prefix . '<span class="dbg-kw dbg-array">array(<em>'.count($var).'</em>)<ul>';
        foreach($var as $k => $v) {
            $ret .= '<li><span class="dbg-key">'.var_debug($k).'</span><em>=&gt;</em><span class="dbg-val">'.var_debug($v, $nested).'</span></li>';
        }
        return $ret . '</ul></span>';
    } elseif ( is_resource($var) ) {
        return $prefix . '<span class="dbg-kw dbg-ressource">res:'.get_resource_type($var).'(<em>'.$var.'</em>)</span>';
    } elseif ( is_object($var) ) {
        $ret = $prefix . '<span class="dbg-kw dbg-object">class(<em>' . get_class( $var ).'</em>)';
        if ($nested < 1) return $ret . '</span>';
        $ret .= '<ul>';
        $ref = new ReflectionClass($var);
        foreach( $ref->getProperties() as $p) {
            $ret .= '<li><span class="dbg-level">';
            if ( $p->isStatic() ) {
                $ret .= '<em>static</em> ';
            }
            if ( $p->isPrivate() ) {
                $ret .= 'private';
                $p->setAccessible(true);
            } elseif( $p->isProtected() ) {
                $ret .= 'protected';
                $p->setAccessible(true);
            } else {
                $ret .= 'public';
            }
            $ret .= ' </span><span class="dbk-key">$'.$p->getName().' </span><span class="dbk-val">'.var_debug($p->getValue($var), $nested - 1).'</span></li>';
        }
        return $ret . '</ul></span>';
    } else {
        return $prefix . '<span class="dbg-kw dbg-undef">undef(?)</span>';
    }
}