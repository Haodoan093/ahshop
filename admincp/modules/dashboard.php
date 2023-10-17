<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #888888;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .h3 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
        background-color: #3498db; /* Màu nền cho tiêu đề */
        color: #fff; /* Màu chữ cho tiêu đề */
        padding: 10px; /* Khoảng cách bên trong tiêu đề */
    }


    .select-date {
        width: 150px;
        display: block;
        margin: 0 auto;
        text-align: center;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #chart {
        margin: 0 auto;
        max-width: 100%;
    }
</style>

<div class="container">
    <h3 class="h3">Thống kê danh thu theo: <span id="text-date"></span></h3>
    <select name="" id="" class="select-date">
        <option value="365ngay">365 ngày</option>
        <option value="90ngay">90 ngày</option>
        <option value="28ngay">28 ngày</option>
        <option value="7ngay">7 ngày</option>
    </select>
    <div id="chart"></div>
</div>
