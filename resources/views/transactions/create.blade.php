@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Amount (Rupiah):</label>
                <input type="number" name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control" id="transactionType">
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="form-group" id="categoryField">
                <label for="category">Category:</label>
                <select name="category" class="form-control">
                    <option value="wage">Wage</option>
                    <option value="bonus">Bonus</option>
                    <option value="gift">Gift</option>
                </select>
            </div>
            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Transaction</button>
        </form>
    </div>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const transactionType = document.getElementById("transactionType");
        const categoryField = document.getElementById("categoryField");
        const categorySelect = categoryField.querySelector("select");

        transactionType.addEventListener("change", function() {
            // Kosongkan pilihan kategori saat jenis transaksi berubah
            categorySelect.innerHTML = '';

            if (transactionType.value === "expense") {
                // Opsi kategori untuk Expense
                const expenseCategories = ["Food & Drinks", "Shopping", "Charity", "Housing", "Insurance", "Taxes", "Transportation"];
                expenseCategories.forEach(category => {
                    const option = document.createElement("option");
                    option.value = category;
                    option.text = category;
                    categorySelect.appendChild(option);
                });
            } else if (transactionType.value === "income") {
                // Opsi kategori untuk Income
                const incomeCategories = ["Wage", "Bonus", "Gift"];
                incomeCategories.forEach(category => {
                    const option = document.createElement("option");
                    option.value = category;
                    option.text = category;
                    categorySelect.appendChild(option);
                });
            }
        });
    });
</script>

@endsection
