<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\{PersonStoreRequest, PersonUpdateRequest};
use App\Http\Resources\Person\{PersonIndexResource, PersonShowResource};
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function index()
    {
        return PersonIndexResource::collection(
            Person::query()
            ->search(request('search'))
            ->orderBy('name', 'asc')
            ->paginate(10)
        );
    }

    public function store(PersonStoreRequest $request)
    {
        $person = Person::create($request->validated());

        $person->phones()->createMany($request->phones);
        $person->emails()->createMany($request->emails);

        return PersonShowResource::make($person);
    }

    public function show(Person $person)
    {
        return PersonShowResource::make($person);
    }

    public function update(PersonUpdateRequest $request, Person $person)
    {
        $personUpdated = DB::transaction(function () use ($person, $request) {
            $person->update($request->validated());

            if ($request->phones) {
                $person->phones()->delete();
                $person->phones()->createMany($request->phones);
            }

            if ($request->emails) {
                $person->emails()->delete();
                $person->emails()->createMany($request->emails);
            }

            return $person;
        });

        return PersonShowResource::make($personUpdated);
    }

    public function destroy(Person $person)
    {
        $person->delete();
    }
}
