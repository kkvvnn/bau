<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('discounts.index', [
            'discounts' => Discount::orderBy('account')
                ->orderBy('name')
                ->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountRequest $request): RedirectResponse
    {
        Discount::create($request->all());

        return redirect()->route('discounts.index')
            ->withSuccess('Новая запись добавлена.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount): View
    {
        return view('discounts.show', [
            'discount' => $discount,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount): View
    {
        return view('discounts.edit', [
            'discount' => $discount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request, Discount $discount): RedirectResponse
    {
        $discount->update($request->all());

        return redirect()->route('discounts.index')
            ->withSuccess('Успешно обновлено.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount): RedirectResponse
    {
        $discount->delete();

        return redirect()->route('discounts.index')
            ->withSuccess('Удалено.');
    }
}
