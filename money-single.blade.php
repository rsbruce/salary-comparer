<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <title>Compare Financial Scenarios</title>
</head>
<body class="max-w-4xl mx-auto p-2">
    <div class="grid grid-cols-1 md:grid-cols-2" x-data="money()">
        <div id="scenario1" class="col-span-1 md:block">
            <div class="flex justify-between">
                <h2 class="text-lg underline">Scenario 1</h2>
                <button class="md:hidden bg-sky-300 rounded-md px-2"
                    x-on:click="() => document.getElementById('scenario2')?.classList.remove('hidden'); document.getElementById('scenario1')?.classList.add('hidden')"
                >Show Scenario 2</button>
            </div>

            <table class="mt-2">
                <tbody>
                    <tr>
                        <td>Annual Salary</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="grossPayAnnual1" class="border rounded-sm w-full" step="1000" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Pension Percent</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="pensionPercent1" min="0" max="100" class="border rounded-sm w-full"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Monthly Housing</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="housingMonthly1" class="border rounded-sm w-full" step="10" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Council Tax</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="councilTax1" class="border rounded-sm w-full" step="10" max="1000" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Bills</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="bills1" class="border rounded-sm w-full" step="10" max="1000" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Days per week in office</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="officeDays1" min="0" max="7" class="border rounded-sm w-full"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Office travel cost per day</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="officeCost1" min="0" max="100" class="border rounded-sm w-full"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="underline font-semibold my-2">
                <span>Discretionary:</span>
                <span>£</span>
                <span x-text="Math.round(netPayMonthly1 - housingMonthly1 - councilTax1 - bills1 - officeCostMonthly1)"></span>
                <span>per month</span>
            </div>
            <div>
                <canvas id="chart1"></canvas>
            </div>
        </div>
        <div id="scenario2" class="col-span-1 hidden md:block">
            <div class="flex justify-between">
                <h2 class="text-lg underline">Scenario 2</h2>
                <button class="md:hidden bg-sky-300 rounded-md px-2"
                    x-on:click="() => document.getElementById('scenario1')?.classList.remove('hidden'); document.getElementById('scenario2')?.classList.add('hidden')"
                >
                Show Scenario 1</button>
            </div>
            <table class="mt-2">
                <tbody>
                    <tr>
                        <td>Annual Salary</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="grossPayAnnual2" class="border rounded-sm w-full" step="1000" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Pension Percent</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="pensionPercent2" min="0" max="100" class="border rounded-sm w-full"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Monthly Housing</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="housingMonthly2" class="border rounded-sm w-full" step="10" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Council Tax</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="councilTax2" class="border rounded-sm w-full" step="10" max="1000" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Bills</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="bills2" class="border rounded-sm w-full" step="10" max="1000" min="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Days per week in office</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="officeDays2" min="0" max="7" class="border rounded-sm w-full"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Office travel cost per day</td>
                        <td>
                            <input type="number" x-on:change.debounce.500ms="() => {setChart(1); setChart(2)}" x-model="officeCost2" min="0" max="100" class="border rounded-sm w-full"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="underline font-semibold my-2">
                <span>Discretionary:</span>
                <span>£</span>
                <span x-text="Math.round(netPayMonthly2 - housingMonthly2 - councilTax2 - bills2 - officeCostMonthly2)"></span>
                <span>per month</span>
            </div>
            <div>
                <canvas id="chart2"></canvas>
            </div>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    window.addEventListener('alpine:init', () => {
        Alpine.data('money', () => ({
            init() {
                this.$watch('grossPayAnnual1', (val) => {localStorage.setItem('grossPayAnnual1', val); this.calcNetPayMonthly(1)})
                this.$watch('grossPayAnnual2', (val) => {localStorage.setItem('grossPayAnnual2', val); this.calcNetPayMonthly(2)})
                this.$watch('pensionPercent1', (val) => {localStorage.setItem('pensionPercent1', val); this.calcNetPayMonthly(1)})
                this.$watch('pensionPercent2', (val) => {localStorage.setItem('pensionPercent2', val); this.calcNetPayMonthly(2)})
                this.$watch('housingMonthly1', (val) => {localStorage.setItem('housingMonthly1', val)})
                this.$watch('housingMonthly2', (val) => {localStorage.setItem('housingMonthly2', val)})
                this.$watch('councilTax1', (val) => {localStorage.setItem('councilTax1', val)})
                this.$watch('councilTax2', (val) => {localStorage.setItem('councilTax2', val)})
                this.$watch('bills1', (val) => {localStorage.setItem('bills1', val)})
                this.$watch('bills2', (val) => {localStorage.setItem('bills2', val)})
                this.$watch('officeCost1', (val) => {localStorage.setItem('officeCost1', val); this.calcNetPayMonthly(1)})
                this.$watch('officeCost2', (val) => {localStorage.setItem('officeCost2', val); this.calcNetPayMonthly(2)})
                this.$watch('officeDays1', (val) => {localStorage.setItem('officeDays1', val); this.calcNetPayMonthly(1)})
                this.$watch('officeDays2', (val) => {localStorage.setItem('officeDays2', val); this.calcNetPayMonthly(2)})
    
                this.calcNetPayMonthly(1)
                this.calcNetPayMonthly(2)

                this.setChart(1)
                this.setChart(2)

            },
            calcNetPayMonthly(n) {
                let basicThresh = 12570
                let higherThresh = 50270
                let additionalTaxThresh = 125140
                let paybackThresh = 125140
                let basicNicRate = 0.08
                let basicTaxRate = 0.2
                let higherNicRate = 0.02
                let higherTaxRate = 0.4
                let additionalTaxRate = 0.45
                let studentLoanThresh = 27295
                let studentLoanRate = 0.09
    
                let incomeTax = 0
                let nic = 0
    
                let studentLoan = 0
                if (this.incStudentLoan && this['grossPayAnnual'+n] > studentLoanThresh) {
                    studentLoan = (this['grossPayAnnual'+n] - studentLoanThresh) * studentLoanRate
                }

                let pension = this['grossPayAnnual'+n] * (this['pensionPercent'+n] / 100)
                
                let taxable = this['grossPayAnnual'+n] - pension

                if (taxable > 100000) {
                    if (taxable < additionalTaxThresh) {
                        paybackThresh += (additionalTaxThresh - taxable) / 2
                    } else {
                        paybackThresh += basicThresh
                    }
                }
    
                if (taxable > basicThresh) {
                    incomeTax += (Math.min(taxable, higherThresh) - basicThresh) * basicTaxRate
                    nic += (Math.min(taxable, higherThresh) - basicThresh) * basicNicRate
                } 
                if (taxable > higherThresh) {
                    incomeTax += (Math.min(taxable, paybackThresh) - higherThresh) * higherTaxRate
                    nic += (taxable - higherThresh) * higherNicRate
                }
                if (taxable > additionalTaxThresh) {
                    incomeTax += (taxable - additionalTaxThresh) * additionalTaxRate
                }
                this['netPayMonthly'+n] = Math.round((taxable - incomeTax - nic - studentLoan) / 12)
                this['incomeTax'+n] = Math.round(incomeTax / 12)
                this['nic'+n] = Math.round(nic / 12)
                this['studentLoan'+n] = Math.round(studentLoan / 12)
                this['pension'+n] = Math.round(pension / 12)
                this['officeCostMonthly'+n] = this['officeCost'+n] * (this['officeDays'+n]) * (52 / 12)
            },
            setChart(n) {
                const ctx = document.getElementById('chart'+n);
    
                if (this['chart'+n]) {
                    this['chart'+n].destroy()
                }
    
                let labels = ['Income Tax', 'NI', 'Council Tax', 'Student Loan', 'Housing', 'Office Travel', 'Bills', 'Pension', 'Discretionary']
                let colors = [
                    'rgb(31, 41, 55)',
                    'rgb(55, 65, 81)',
                    'rgb(75, 85, 99)',
                    'rgb(107, 114, 128)',
                    'rgb(239, 68, 68)',
                    'rgb(248, 113, 113)',
                    'rgb(252, 165, 165)',
                    'rgb(110, 231, 183)',
                    'rgb(16, 185, 129)',
                ]
                let data = [
                    this['incomeTax'+n], 
                    this['nic'+n], 
                    this['councilTax'+n], 
                    this['studentLoan'+n], 
                    this['housingMonthly'+n], 
                    this['officeCostMonthly'+n],
                    this['bills'+n], 
                    this['pension'+n], 
                    this['netPayMonthly'+n] - this['housingMonthly'+n] - this['councilTax'+n] - this['bills'+n] - this['officeCostMonthly'+n],
                ]
    
                let salaryDifference = n === 1 ? (this.grossPayAnnual2 - this.grossPayAnnual1) / 12 : (this.grossPayAnnual1 - this.grossPayAnnual2) / 12

                if(salaryDifference > 0) {
                    labels.push('Salary Shortfall')
                    colors.push('rgb(240, 240, 240)')
                    data.push(salaryDifference)
                }
                
    
                this['chart'+n] = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: colors,
                        }],
    
                        hoverOffset: 4
                    },
                });
            },
            incStudentLoan: true,
            netPayMonthly1: 0,
            netPayMonthly2: 0,
            pension1: 0,
            pension2: 0,
            incomeTax1: 0,
            incomeTax2: 0,
            nic1: 0,
            nic2: 0,
            grossPayAnnual1: localStorage.getItem('grossPayAnnual1') ?? 0,
            grossPayAnnual2: localStorage.getItem('grossPayAnnual2') ?? 0,
            pensionPercent1: localStorage.getItem('pensionPercent1') ?? 5,
            pensionPercent2: localStorage.getItem('pensionPercent2') ?? 5,
            studentLoan1: localStorage.getItem('studentLoan1') ?? 0,
            studentLoan2: localStorage.getItem('studentLoan2') ?? 0,
            housingMonthly1: localStorage.getItem('housingMonthly1') ?? 0,
            housingMonthly2: localStorage.getItem('housingMonthly2') ?? 0,
            councilTax1: localStorage.getItem('councilTax1') ?? 0,
            councilTax2: localStorage.getItem('councilTax2') ?? 0,
            bills1: localStorage.getItem('bills1') ?? 0,
            bills2: localStorage.getItem('bills2') ?? 0,
            officeDays1: localStorage.getItem('officeDays1') ?? 0,
            officeDays2: localStorage.getItem('officeDays2') ?? 0,
            officeCost1: localStorage.getItem('officeCost1') ?? 0,
            officeCost2: localStorage.getItem('officeCost2') ?? 0,
            officeCostMonthly1: 0,
            officeCostMonthly2: 0,
            chart1: null,
            chart2: null,
            chartResetNeeded: false
        }))
    })

    
</script>
</html>    