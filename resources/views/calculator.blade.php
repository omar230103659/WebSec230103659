@extends('layouts.master')

@section('title', 'Calculator')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Simple Calculator</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-lg">
                <div class="form-group">
                    <label for="num1">Enter First Number:</label>
                    <input type="number" id="num1" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="num2">Enter Second Number:</label>
                    <input type="number" id="num2" class="form-control">
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary" onclick="calculate('+')">+</button>
                    <button class="btn btn-danger" onclick="calculate('-')">-</button>
                    <button class="btn btn-success" onclick="calculate('*')">*</button>
                    <button class="btn btn-warning" onclick="calculate('/')">/</button>
                </div>

                <h3 class="mt-4 text-center">Result: <span id="result">0</span></h3>
            </div>
        </div>
    </div>
</div>

<script>
    function calculate(operation) {
        let num1 = parseFloat(document.getElementById('num1').value);
        let num2 = parseFloat(document.getElementById('num2').value);
        let result = 0;

        if (isNaN(num1) || isNaN(num2)) {
            alert("Please enter valid numbers!");
            return;
        }

        switch (operation) {
            case '+': result = num1 + num2; break;
            case '-': result = num1 - num2; break;
            case '*': result = num1 * num2; break;
            case '/': 
                if (num2 === 0) {
                    alert("Cannot divide by zero!");
                    return;
                }
                result = num1 / num2; 
                break;
        }

        document.getElementById('result').textContent = result;
    }
</script>
@endsection
