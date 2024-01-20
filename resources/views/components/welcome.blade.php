<div class="p-2 lg:p-3 bg-white border-b border-gray-200">
  <div class="mx-auto"> <!-- Removed max-w-xl -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <div class="px-6 py-4">
        <h2 class="text-lg font-semibold text-gray-800">Patient Information</h2>
      </div>
      <div class="relative px-2 py-2">
      <form class="space-y-4" method="POST" action="{{ route('dashboard.store') }}">
       @csrf <!-- Adding CSRF token -->
       <div class="mb-4">
        <label for="sname" class="block text-sm font-medium text-gray-700">SurName</label>
        <input type="text" id="sname" name="sname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('sname') }}">
    </div>
    <div class="mb-4">
        <label for="lname" class="block text-sm font-medium text-gray-700">LastName</label>
        <input type="text" id="lname" name="lname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('lname') }}">
    </div>



    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address </label>
        <input type="text" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500  @error('email') is-invalid @else is-valid @enderror" value="{{ old('email') }}">
    </div>

    <div class="mb-4">
        <label for="contact" class="block text-sm font-medium text-gray-700"> Contact</label>
        <input type="tel" id="contact" name="contact" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('contact') }}">
    </div>

    <div class="mb-4">
        <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
        <select id="sex" name="sex" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
            <option {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="mb-4" style="display:flex;">
        <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
        <input type="number" id="age" name="age" class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('age') }}">
        <select id="agecount" name="agecount" class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="months" {{ old('agecount') == 'months' ? 'selected' : '' }}>months</option>
            <option value="years" {{ old('agecount') == 'years' ? 'selected' : '' }}>years</option>
        </select>
    </div>

          
          <div class="mb-4 row">
  <label class="col-12 text-sm font-medium text-gray-700">Test Required</label>

  <!-- Checkbox 1 -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="dDimerTest" name="testRequired[]" value="D-Dimer test" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="dDimerTest" class="ml-2 text-gray-700">D-Dimer test</label>
    </div>
  </div>

  <!-- Checkbox 2 -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="cReactiveProtein" name="testRequired[]" value="C-Reactive protein (CRP)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="cReactiveProtein" class="ml-2 text-gray-700">C-Reactive protein (CRP)</label>
    </div>
  </div>

  <!-- Checkbox 3 -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="cti" name="testRequired[]" value="cti test" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="cti" class="ml-2 text-gray-700">Cardiac Troponin-I</label>
    </div>
  </div>

  <!-- Checkbox 4 -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="HBA1C" name="testRequired[]" value="HBA1C(Glycated Hemoglobin)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="HBA1C" class="ml-2 text-gray-700">HBA1C(Glycated Hemoglobin)</label>
    </div>
  </div>

 

          <!-- PCT Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="PCT" name="testRequired[]" value="PCT(Pro-calcitonin)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="PCT" class="ml-2 text-gray-700">PCT(Pro-calcitonin)</label>
    </div>
  </div>

 


  <!-- FSH Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="FSH" name="testRequired[]" value="FSH" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="FSH" class="ml-2 text-gray-700">Follicle stimulating hormone-FSH</label>
    </div>
  </div>

  <!-- Estrogen Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="estrogen" name="testRequired[]" value="Estrogen" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="estrogen" class="ml-2 text-gray-700">Estrogen</label>
    </div>
  </div>

  <!-- Prolactin Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="prolactin" name="testRequired[]" value="Prolactin" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="prolactin" class="ml-2 text-gray-700">Prolactin</label>
    </div>
  </div>

  <!-- Progesterone Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Progesterone" name="testRequired[]" value="Progesterone" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Progesterone" class="ml-2 text-gray-700">Progesterone</label>
    </div>
  </div>          
          <!-- Testosterone Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Testesterone" name="testRequired[]" value="Testesterone" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Testesterone" class="ml-2 text-gray-700">Testesterone</label>
    </div>
  </div>

  <!-- Luteinizing hormone Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Luteinizing hormone(LH)" name="testRequired[]" value="Luteinizing hormone(LH)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Luteinizing hormone(LH)" class="ml-2 text-gray-700">Luteinizing hormone(LH)</label>
    </div>
  </div>

  <!-- Total T4 Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Total T4" name="testRequired[]" value="Total T4" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Total T4" class="ml-2 text-gray-700">Total T4</label>
    </div>
  </div>

  <!-- Total T3 Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Total T3" name="testRequired[]" value="Total T3" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Total T3" class="ml-2 text-gray-700">Total T3</label>
    </div>
  </div>

  <!-- Free T3 Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Free T3" name="testRequired[]" value="Free T3" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Free T3" class="ml-2 text-gray-700"> Free T3</label>
    </div>
  </div>

  <!-- Free T4 Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Free T4" name="testRequired[]" value="Free T4" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Free T4" class="ml-2 text-gray-700">Free T4</label>
    </div>
  </div>

  <!-- Thyroid stimulating hormone Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Thyroid stimulating hormone(TSH)" name="testRequired[]" value="Thyroid stimulating hormone(TSH)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Thyroid stimulating hormone(TSH)" class="ml-2 text-gray-700">Thyroid stimulating hormone(TSH)</label>
    </div>
  </div>

  <!-- Total PSA Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Total PSA" name="testRequired[]" value="Total PSA" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Total PSA" class="ml-2 text-gray-700">Total PSA</label>
    </div>
  </div>

  <!-- NT-pro BNP Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="NT-pro BNP" name="testRequired[]" value="NT-pro BNP" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="NT-pro BNP" class="ml-2 text-gray-700">NT-pro BNP</label>
    </div>
  </div>

  <!-- CRP/hs/CRP Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="CRP/hs/CRP" name="testRequired[]" value="CRP/hs/CRP" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="CRP/hs/CRP" class="ml-2 text-gray-700">CRP/hs/CRP</label>
    </div>
  </div>

  <!-- Blood Grouping Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Blood Grouping" name="testRequired[]" value="Blood Grouping" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Blood Grouping" class="ml-2 text-gray-700">Blood Grouping</label>
    </div>
  </div>
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="UricAcid" name="testRequired[]" value="Uric Acid" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="UricAcid" class="ml-2 text-gray-700">Uric Acid</label>
    </div>
  </div>
 


  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="LFTS/RFT/Lipid profile" name="testRequired[]" value="LFTS/RFT/Lipid profile" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="LFTS/RFT/Lipid profile" class="ml-2 text-gray-700">LFTS/RFT/Lipid profile</label>
    </div>
  </div>
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="H. Pylori-Antigen(Stool)" name="testRequired[]" value="H. Pylori-Antigen(Stool)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="H. Pylori-Antigen(Stool)" class="ml-2 text-gray-700">H. Pylori-Antigen(Stool)</label>
    </div>
  </div>
  

  <!-- Glucose(RBS) Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Glucose(RBS)" name="testRequired[]" value="Glucose(RBS)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Glucose(RBS)" class="ml-2 text-gray-700">Glucose(RBS)</label>
    </div>
   </div>

         <!-- Renal function test(RFTs) Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="RFTs" name="testRequired[]" value="Renal function test(RFTs)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="RFTs" class="ml-2 text-gray-700">Renal function test(RFTs)</label>
    </div>
  </div>

 



  <!-- Blood Slide for malaria Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="BloodSlide" name="testRequired[]" value="Blood Slide for malaria" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="BloodSlide" class="ml-2 text-gray-700">Blood Slide for malaria</label>
    </div>
  </div>

  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Urinalysis(Microscopy and Biochemistry)" name="testRequired[]" value="Urinalysis(Microscopy and Biochemistry)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Urinalysis(Microscopy and Biochemistry)" class="ml-2 text-gray-700">Urinalysis(Microscopy and Biochemistry)</label>
    </div>
  </div>

  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Stool Microscopy" name="testRequired[]" value="Stool Microscopy" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Stool Microscopy" class="ml-2 text-gray-700">Stool Microscopy</label>
    </div>
  </div>


  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="HBsAg screening" name="testRequired[]" value="HBsAg screening" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="HBsAg screening" class="ml-2 text-gray-700">HBsAg screening</label>
    </div>
  </div>

  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="HCV antibody test" name="testRequired[]" value="HCV antibody test" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="HCV antibody test" class="ml-2 text-gray-700">HCV antibody test</label>
    </div>
</div>

<div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="H.pylori-Antibody (Blood)" name="testRequired[]" value="H.pylori-Antibody (Blood)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="H.pylori-Antibody (Blood)" class="ml-2 text-gray-700">H.pylori-Antibody (Blood)</label>
    </div>
</div>

  


  <!-- Malaria antigen test(RDT) Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="MalariaTest" name="testRequired[]" value="Malaria antigen test(RDT)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="MalariaTest" class="ml-2 text-gray-700">Malaria antigen test(RDT)</label>
    </div>
  </div>

  <!-- Urine HCG Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="UrineHCG" name="testRequired[]" value="Urine HCG" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="UrineHCG" class="ml-2 text-gray-700">Urine HCG</label>
    </div>
  </div>





          <!-- BAT Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="BAT" name="testRequired[]" value="BAT (Brucella agglutination test)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="BAT" class="ml-2 text-gray-700">BAT (Brucella agglutination test)</label>
    </div>
  </div>

  <!-- Widal Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Widal" name="testRequired[]" value="Widal(with Titers)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Widal" class="ml-2 text-gray-700">Widal(with Titers)</label>
    </div>
  </div>

  <!-- HIV 1&2 Antibody Screening Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="HIV" name="testRequired[]" value="HIV 1&2 antibody screening" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="HIV" class="ml-2 text-gray-700">HIV 1&2 antibody screening</label>
    </div>
  </div>

  <!-- TPHA Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="TPHA" name="testRequired[]" value="TPHA" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="TPHA" class="ml-2 text-gray-700">TPHA</label>
    </div>
  </div>

  <!-- FOB Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="FOB" name="testRequired[]" value="FOB(fecal occult blood)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="FOB" class="ml-2 text-gray-700">FOB(fecal occult blood)</label>
    </div>
  </div>

  <!-- Ferritin Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="Ferritin" name="testRequired[]" value="Ferritin" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="Ferritin" class="ml-2 text-gray-700">Ferritin</label>
    </div>
  </div>

  <!-- PT/INR Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="PTINR" name="testRequired[]" value="PT/INR" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="PTINR" class="ml-2 text-gray-700">PT/INR</label>
    </div>
  </div>

  <!-- RF(quantitative) Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="RFQuantitative" name="testRequired[]" value="RF(quantitative)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="RFQuantitative" class="ml-2 text-gray-700">RF(quantitative)</label>
    </div>
  </div>

  <!-- Beta-HCG Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="BetaHCG" name="testRequired[]" value="Beta-HCG" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="BetaHCG" class="ml-2 text-gray-700">Beta-HCG</label>
    </div>
  </div>




  <!-- Serum/plasma HCG Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="SerumHCG" name="testRequired[]" value="Serum/plasma HCG" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="SerumHCG" class="ml-2 text-gray-700">Serum/plasma HCG</label>
    </div>
  </div>

  <!-- Sickle Cell Scan(Hb Electrophoresis) Checkbox -->
  <div class="col-3 mb-2">
    <div class="flex items-center ml-3 mr-4 mb-2">
      <input type="checkbox" id="SickleCellScan" name="testRequired[]" value="Sickle Cell Scan(Hb Electrophoresis)" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <label for="SickleCellScan" class="ml-2 text-gray-700">Sickle Cell Scan(Hb Electrophoresis)</label>
    </div>
  </div>
  
  <!-- RFTs Checkbox -->
<div class="col-5 mb-2">
    <div class="flex flex-col ml-3 mr-4 mb-2">
        <label class="ml-2 text-gray-700">Renal function test (RFTS)</label>

        <div class="flex flex-wrap">

               <!-- Select All Checkbox -->
           <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="renal_select_all" class="mr-2" onchange="toggleLFTCheckboxes1(this)">
                <label for="renal_select_all">Select All</label>
            </div>

            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="clCheckbox" name="testRequired[]" value="Cl-" class="mr-2 renal-checkbox">
                <label for="clCheckbox">Cl-</label>
            </div>

            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="co2Checkbox" name="testRequired[]" value="CO2" class="mr-2 renal-checkbox">
                <label for="co2Checkbox">CO2</label>
            </div>

            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="kCheckbox" name="testRequired[]" value="K+" class="mr-2 renal-checkbox">
                <label for="kCheckbox">K+</label>
            </div>

            <div class="flex items-center mb-2">
                <input type="checkbox" id="naCheckbox" name="testRequired[]" value="Na+" class="mr-2 renal-checkbox">
                <label for="naCheckbox">Na+</label>
            </div>

            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="gluCheckbox" name="testRequired[]" value="GLU" class="mr-2 renal-checkbox">
                <label for="gluCheckbox">GLU</label>
            </div>

            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="ureaCheckbox" name="testRequired[]" value="UREA" class="mr-2 renal-checkbox">
                <label for="ureaCheckbox">UREA</label>
            </div>

            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="creCheckbox" name="testRequired[]" value="CRE" class="mr-2 renal-checkbox">
                <label for="creCheckbox">CRE</label>
            </div>

            <div class="flex items-center mb-2">
                <input type="checkbox" id="amyCheckbox" name="testRequired[]" value="AMY" class="mr-2 renal-checkbox">
                <label for="amyCheckbox">AMY</label>
            </div>
        </div>
    </div>
</div>


<!-- CBC/Full Hemogram Checkbox -->
<div class="col-6 mb-2 mr-4">
    <div class="flex flex-col ml-2 mr-4 mb-2">
        <label class="text-gray-700">CBC/Full Hemogram</label>

        <div class="flex flex-wrap">

             <!-- Select All Checkbox -->
           <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_select_all" class="mr-2" onchange="toggleLFTCheckboxes2(this)">
                <label for="cbc_select_all">Select All</label>
            </div>
            <!-- WBC -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_WBC" name="testRequired[]" value="WBC" class="mr-2 cbc-checkbox ">
                <label for="cbc_WBC">WBC</label>
            </div>

            <!-- Neu# -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Neu#" name="testRequired[]" value="Neu#" class="mr-2 cbc-checkbox ">
                <label for="cbc_Neu#">Neu#</label>
            </div>

            <!-- Lym# -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Lym#" name="testRequired[]" value="Lym#" class="mr-2 cbc-checkbox ">
                <label for="cbc_Lym#">Lym#</label>
            </div>

            <!-- Mon# -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Mon#" name="testRequired[]" value="Mon#" class="mr-2 cbc-checkbox ">
                <label for="cbc_Mon#">Mon#</label>
            </div>

            <!-- Eos# -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Eos#" name="testRequired[]" value="Eos#" class="mr-2 cbc-checkbox ">
                <label for="cbc_Eos#">Eos#</label>
            </div>

            <!-- Bas# -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Bas#" name="testRequired[]" value="Bas#" class="mr-2 cbc-checkbox ">
                <label for="cbc_Bas#">Bas#</label>
            </div>

            <!-- Neu% -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Neu%" name="testRequired[]" value="Neu%" class="mr-2 cbc-checkbox ">
                <label for="cbc_Neu%">Neu%</label>
            </div>

            <!-- Lym% -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Lym%" name="testRequired[]" value="Lym%" class="mr-2 cbc-checkbox ">
                <label for="cbc_Lym%">Lym%</label>
            </div>

            <!-- Mon% -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Mon%" name="testRequired[]" value="Mon%" class="mr-2 cbc-checkbox ">
                <label for="cbc_Mon%">Mon%</label>
            </div>

            <!-- Eos% -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Eos%" name="testRequired[]" value="Eos%" class="mr-2 cbc-checkbox ">
                <label for="cbc_Eos%">Eos%</label>
            </div>

            <!-- Bas% -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_Bas%" name="testRequired[]" value="Bas%" class="mr-2 cbc-checkbox ">
                <label for="cbc_Bas%">Bas%</label>
            </div>

            <!-- RBC -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_RBC" name="testRequired[]" value="RBC" class="mr-2 cbc-checkbox ">
                <label for="cbc_RBC">RBC</label>
            </div>

            <!-- HGB -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_HGB" name="testRequired[]" value="HGB" class="mr-2 cbc-checkbox ">
                <label for="cbc_HGB">HGB</label>
            </div>

            <!-- HCT -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_HCT" name="testRequired[]" value="HCT" class="mr-2 cbc-checkbox ">
                <label for="cbc_HCT">HCT</label>
            </div>

            <!-- MCV -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_MCV" name="testRequired[]" value="MCV" class="mr-2 cbc-checkbox ">
                <label for="cbc_MCV">MCV</label>
            </div>

            <!-- MCH -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_MCH" name="testRequired[]" value="MCH" class="mr-2 cbc-checkbox ">
                <label for="cbc_MCH">MCH</label>
            </div>

            <!-- MCHC -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_MCHC" name="testRequired[]" value="MCHC" class="mr-2 cbc-checkbox ">
                <label for="cbc_MCHC">MCHC</label>
            </div>

            <!-- RDW-CV -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_RDW-CV" name="testRequired[]" value="RDW-CV" class="mr-2 cbc-checkbox ">
                <label for="cbc_RDW-CV">RDW-CV</label>
            </div>

            <!-- RDW-SD -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_RDW-SD" name="testRequired[]" value="RDW-SD" class="mr-2 cbc-checkbox ">
                <label for="cbc_RDW-SD">RDW-SD</label>
            </div>

            <!-- PLT -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_PLT" name="testRequired[]" value="PLT" class="mr-2 cbc-checkbox ">
                <label for="cbc_PLT">PLT</label>
            </div>

            <!-- MPV -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_MPV" name="testRequired[]" value="MPV" class="mr-2 cbc-checkbox ">
                <label for="cbc_MPV">MPV</label>
            </div>

            <!-- PDW -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="cbc_PDW" name="testRequired[]" value="PDW" class="mr-2 cbc-checkbox ">
                <label for="cbc_PDW">PDW</label>
            </div>

            <!-- PCT -->
            <div class="flex items-center">
                <input type="checkbox" id="cbc_PCT" name="testRequired[]" value="PCT" class="mr-2 cbc-checkbox ">
                <label for="cbc_PCT">PCT</label>
            </div>
        </div>
    </div>
</div>


<!-- Lipid profile-Cholesterol level Checkbox -->
<div class="col-5 mb-2">
    <div class="flex flex-col ml-3 mr-4 mb-2">
        <label class="text-gray-700">Lipid Profile - Cholesterol</label>

        <div class="flex flex-wrap">

           <!-- Select All Checkbox -->
           <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lipidprofile_select_all" class="mr-2 " onchange="toggleLFTCheckboxes3(this)">
                <label for="lipidprofile_select_all">Select All</label>
            </div>
            <!-- GLU -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lipid_GLU" name="testRequired[]" value="GLU" class="mr-2 lp-checkbox ">
                <label for="lipid_GLU">GLU</label>
            </div>

            <!-- TG -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lipid_TG" name="testRequired[]" value="TG" class="mr-2 lp-checkbox">
                <label for="lipid_TG">TG</label>
            </div>

            <!-- CHOL -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lipid_CHOL" name="testRequired[]" value="CHOL" class="mr-2 lp-checkbox">
                <label for="lipid_CHOL">CHOL</label>
            </div>

            <!-- HDL-C -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lipid_HDL" name="testRequired[]" value="HDL-C" class="mr-2 lp-checkbox">
                <label for="lipid_HDL">HDL-C</label>
            </div>

            <!-- LDL-C -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lipid_LDL" name="testRequired[]" value="LDL-C" class="mr-2 lp-checkbox">
                <label for="lipid_LDL">LDL-C</label>
            </div>

            <!-- GSP -->
            <div class="flex items-center">
                <input type="checkbox" id="lipid_GSP" name="testRequired[]" value="GSP" class="mr-2 lp-checkbox">
                <label for="lipid_GSP">GSP</label>
            </div>
        </div>
    </div>
</div>

<!-- Liver Function Test (LFTS) Checkbox -->
<div class="col-5 mb-2">
    <div class="flex flex-col ml-3 mr-4 mb-2">
        <label class="text-gray-700">Liver Function Test (LFTS)</label>

        <div class="flex flex-wrap">

             <!-- Select All Checkbox -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_select_all" class="mr-2" onchange="toggleLFTCheckboxes4(this)">
                <label for="lfts_select_all">Select All</label>
            </div>
            
            <!-- TP -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_TP" name="testRequired[]" value="TP" class="mr-2 lfts-checkbox">
                <label for="lfts_TP">TP</label>
            </div>

            <!-- ALB -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_ALB" name="testRequired[]" value="ALB" class="mr-2 lfts-checkbox">
                <label for="lfts_ALB">ALB</label>
            </div>

            <!-- GLO -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_GLO" name="testRequired[]" value="GLO" class="mr-2 lfts-checkbox">
                <label for="lfts_GLO">GLO</label>
            </div>

            <!-- A/G -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_A/G" name="testRequired[]" value="A/G" class="mr-2 lfts-checkbox">
                <label for="lfts_A/G">A/G</label>
            </div>

            <!-- TBIL -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_TBIL" name="testRequired[]" value="TBIL" class="mr-2 lfts-checkbox">
                <label for="lfts_TBIL">TBIL</label>
            </div>

            <!-- ALT -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_ALT" name="testRequired[]" value="ALT" class="mr-2 lfts-checkbox">
                <label for="lfts_ALT">ALT</label>
            </div>

            <!-- AST -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_AST" name="testRequired[]" value="AST" class="mr-2 lfts-checkbox">
                <label for="lfts_AST">AST</label>
            </div>

            <!-- GGT -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_GGT" name="testRequired[]" value="GGT" class="mr-2 lfts-checkbox">
                <label for="lfts_GGT">GGT</label>
            </div>

            <!-- DBIL -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_DBIL" name="testRequired[]" value="DBIL" class="mr-2 lfts-checkbox">
                <label for="lfts_DBIL">DBIL</label>
            </div>

            <!-- IBIL -->
            <div class="flex items-center mb-2 mr-4">
                <input type="checkbox" id="lfts_IBIL" name="testRequired[]" value="IBIL" class="mr-2 lfts-checkbox">
                <label for="lfts_IBIL">IBIL</label>
            </div>

            <!-- ALP -->
            <div class="flex items-center">
                <input type="checkbox" id="lfts_ALP" name="testRequired[]" value="ALP" class="mr-2 lfts-checkbox">
                <label for="lfts_ALP">ALP</label>
            </div>
        </div>
    </div>
</div>




       <div class="mb-4">
            <label for=" Other Test" class="block text-sm font-medium text-gray-700"> Other Test</label>
            <input type="text" id="other test" name="testRequired[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
          </div>

</div>
        <div class="mt-6">
            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Submit</button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>



