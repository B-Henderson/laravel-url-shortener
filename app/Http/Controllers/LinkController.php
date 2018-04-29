<?php
namespace App\Http\Controllers;

use App\Link;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Request;

class LinkController extends BaseController
{

    public function make()
    {
        $validator = Validator::make(Request::all(), array(
            'url' => 'required|url|max:255',
        ));
        if ($validator->fails()) {
            return Redirect::action('HomeController@index')->withInput()->withErrors($validator);
        } else {
            $url  = Request::get('url');
            $code = null;

            $exists = Link::where('url', '=', $url);

            if ($exists->count() === 1) {
                echo $code = $exists->first()->code;
            } else {

                $created = Link::create(array(
                    'url'  => $url,
                    'code' => '',
                ));

                if ($created) {
                    $code = base_convert($created->id, 10, 36);

                    Link::where('id', '=', $created->id)->update(array(
                        'code' => $code,
                    ));
                }

            }
            if ($code) {
                //if we have a code redirect to home

                return redirect()->route('home')->with('global', 'Shorted to: <a href="' . url()->action('LinkController@get', $code) . '">' . url()->action('LinkController@get', $code) . '</a>');
            }

        }
        //default to
        return redirect()->route('home')->with('global', 'We seem to have a problem, please try again');
    }
    public function get($code)
    {
        $link = Link::where('code', '=', $code);

        if ($link->count() === 1) {
            return Redirect::to($link->first()->url);
        }

        return Redirect::action('HomeController@index');
    }
}
