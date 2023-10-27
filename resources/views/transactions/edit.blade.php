@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="amount">Amount (Rupiah):</label>
                <input type="number" name="amount" class="form-control" value="{{ $transaction->amount }}">
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control" id="transactionType">
                    <option value="income" @if($transaction->type === 'income') selected @endif>Income</option>
                    <option value="expense" @if($transaction->type === 'expense') selected @endif>Expense</option>
                </select>
            </div>
            <div class="form-group" id="categoryField">
                <label for="category">Category:</label>
                <select name="category" class="form-control">
                    <!-- Opsi kategori akan ditambahkan oleh JavaScript -->
                </select>
            </div>
            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes" class="form-control">{{ $transaction->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const transactionType = document.getElementById("transactionType");
            const categoryField = document.getElementById("categoryField");
            const categorySelect = categoryField.querySelector("select");

            // Tambahkan opsi kategori saat halaman dimuat
            if (transactionType.value === "expense") {
                const expenseCategories = ["Food & Drinks", "Shopping", "Charity", "Housing", "Insurance", "Taxes", "Transportation"];
                expenseCategories.forEach(category => {
                    const option = document.createElement("option");
                    option.value = category;
                    option.text = category;
                    categorySelect.appendChild(option);
                });
            } else if (transactionType.value === "income") {
                const incomeCategories = ["Wage", "Bonus", "Gift"];
                incomeCategories.forEach(category => {
                    const option = document.createElement("option");
                    option.value = category;
                    option.text = category;
                    categorySelect.appendChild(option);
                });
            }

            // Tambahkan event listener untuk perubahan jenis transaksi
            transactionType.addEventListener("change", function() {
                categorySelect.innerHTML = ''; // Kosongkan opsi kategori saat jenis berubah

                if (transactionType.value === "expense") {
                    const expenseCategories = ["Food & Drinks", "Shopping", "Charity", "Housing", "Insurance", "Taxes", "Transportation"];
                    expenseCategories.forEach(category => {
                        const option = document.createElement("option");
                        option.value = category;
                        option.text = category;
                        categorySelect.appendChild(option);
                    });
                } else if (transactionType.value === "income") {
                    const incomeCategories = ["Wage", "Bonus", "Gift"];
                    incomeCategories.forEach(category => {
                        const option = document.createElement("option");
                        option.value = category;
                        option.text = category;
                        categorySelect.appendChild(option);
                    });
                }
            });

            // Set nilai default kategori berdasarkan objek transaksi
            categorySelect.value = "{{ $transaction->category }}";
        });
    </script>
@endsection
