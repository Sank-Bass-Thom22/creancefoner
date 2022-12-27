<div>


                    <div class="form-group ">
                        <label for="Repaymentway">Mode de remboursement : </label>
                        <select id="Repaymentway" class="form-control" name="repaymentway" wire:click="changeEvent($event.target.value)" required>
                            <option value=""></option>
                            <option value="En espèces">En espèces</option>
                            <option value="Par chèque">Par chèque</option>
                            <option value="Par mobile money">Par mobile money</option>
                            <option value="Virement banquaire">Par virement banquaire</option>
                        </select>
                    </div>

                    @if($mode=="Virement banquaire")
                        <div class="group-group">
                            <label for="Bank">Banque </label>
                            <select id="Bank" name="bank" class="form-control" >
                                <option></option>
                                @foreach ($allBank as $banks)
                                <option value="{{ $banks->id }}">{{ $banks->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    @endif

                    <div class="group-group ">
                        <label for="Description">Description </label>
                        <textarea class="form-control" id="Description" name="description" rows="5" cols="50"></textarea>
                    </div>

</div>
