<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get list country
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::where('is_admin','=',1)->first();

        $countries = $this->country->getFullList();

        return view('pages.backend.country.country_list', [
            'countries' => $countries,
            'user' => $user
        ]);
    }

    /**
     * Create country
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);
        $model = new Country();
        $model->fill($data)->save();

        return redirect()->route('admin.country.index')->with('success', 'Ajoutez le succès du pays !');
    }

    /**
     * Update country
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'country_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);

        $model = Country::findOrFail($request->country_id);
        $model->fill($data);

        if ($model->save())
            return redirect()->route('admin.country.index')->with('success', 'Pays à jour avec succès!');
        else
            return redirect()->route('admin.country.index')->with('error', 'Échec de la mise à jour du pays !');
    }

    /**
     * Delete country
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Country::destroy($id);
        return redirect()->route('admin.country.index')->with('success', 'Supprimer le succès du pays !');
    }
}