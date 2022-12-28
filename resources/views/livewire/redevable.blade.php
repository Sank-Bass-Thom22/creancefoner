<div>


   
                   

                    <div class="group-group "  wire:ignore>
                        <label for="debtor">Redevable </label>
                        <select id="debtor"   name="debtor" wire:change="changeEvent($event.target.value)" class="form-control selectpicker"  data-live-search="true"  required>
                            <option value="0">Choisir redevable</option>
                            @foreach ($debtors as $debtor)
                                <option value="{{ $debtor->id}}">
   
                                    {{ $debtor->firstname }} {{ $debtor->lastname }} - {{ $debtor->telephone }}
                                </option>
                        
                            @endforeach
                        </select>
                    </div>
                 
                    @php
                        $totalDue=0;
                        $totalPaid=0;
                    @endphp

                    @if($redevable!=null)
                   
                  

                    @foreach ($redevable->loans as $loan)
                    @php
                        $totalDue+= $loan->amount+($loan->amount*$loan->rate->value/100)
                    @endphp
                    
                    @endforeach

                    @foreach ($redevable->repayments as $repayment)
                    @php
                        $totalPaid+= $repayment->amount
                    @endphp
                    
                    @endforeach
                  
                    <table class="table header-border">
                        <tr>
                            <th>TOTAL DÛ</th>
                            <th>TOTAL PAYÉ</th>
                            <th>RESTE À PAYER</th>
                            
                        </tr>
                        <tr>
                            <td>{{ $totalDue }} Francs CFA</td>
                            <td>{{ $totalPaid }} Francs CFA</td>
                            <td>{{ $totalDue - $totalPaid }} Francs CFA</td>
                            
                        </tr>
                    </table>
                    @endif
                    
                    
                   
                
                 
</div>
                  