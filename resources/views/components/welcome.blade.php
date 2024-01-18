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
        <label for="name" class="block text-sm font-medium text-gray-700">Patient Name</label>
        <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('name') }}">
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
        <input type="number" id="age" name="age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('age') }}">
        <select id="agecount" name="agecount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
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

  <!-- RFTs Checkbox -->
  <div class="col-3 mb-2">
  <div class="flex items-center ml-3 mr-4 mb-2">
    <label for="lftsSelect" class="ml-2 text-gray-700">Renal function test(RFTS)</label>
    <select id="lftsSelect" name="testRequired[]" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <option value="Cl-">Cl-</option>
      <option value="CO2">CO2</option>
      <option value="K+">K+</option>
      <option value="Na+">Na+</option>
      <option value="GLU">GLU</option>
      <option value="UREA">UREA</option>
      <option value="CRE">CRE</option>
      <option value="AMY">AMY</option>
    </select>
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
 

<!-- LFTS alone-Liver function test Select -->
<div class="col-3 mb-2">
  <div class="flex items-center ml-3 mr-4 mb-2">
    <label for="lftsSelect" class="ml-2 text-gray-700">LFTS alone-Liver function test</label>
    <select id="lftsSelect" name="testRequired[]" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <option value="TP">TP</option>
      <option value="ALB">ALB</option>
      <option value="GLO">GLO</option>
      <option value="A/G">A/G</option>
      <option value="TBIL">TBIL</option>
      <option value="ALT">ALT</option>
      <option value="AST">AST</option>
      <option value="GGT">GGT</option>
      <option value="DBIL">DBIL</option>
      <option value="IBIL">IBIL</option>
      <option value="ALP">ALP</option>
    </select>
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

  <!-- Lipid profile-Cholesterol level Checkbox -->
  <div class="col-3 mb-2">
  <div class="flex items-center ml-3 mr-4 mb-2">
    <label for="lftsSelect" class="ml-2 text-gray-700">Lipid profile-cholesterol</label>
    <select id="lftsSelect" name="testRequired[]" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <option value="TP">GLU</option>
      <option value="ALB">TG</option>
      <option value="GLO">CHOL</option>
      <option value="A/G">HDL-C</option>
      <option value="TBIL">LDL-C</option>
      <option value="ALT">GSP</option>
    </select>
  </div>
</div>

  <!-- CBC/Full Hemogram Checkbox -->
<div class="col-3 mb-2">
  <div class="flex items-center ml-3 mr-4 mb-2">
  <label for="CBC" class="ml-2 text-gray-700">CBC/Full Hemogram</label>
    <select id="testSelect" name="testRequired[]" class="rounded border-gray-300 text-indigo-500 focus:border-indigo-500 focus:ring-indigo-500">
      <option value="WBC">WBC</option>
      <option value="Neu#">Neu#</option>
      <option value="Lym#">Lym#</option>
      <option value="Mon#">Mon#</option>
      <option value="Eos#">Eos#</option>
      <option value="Bas#">Bas#</option>
      <option value=" Neu%">Neu%</option>
      <option value="Lym%">Lym%</option>
      <option value="Mon%">Mon%</option>
      <option value="Eos%">Eos%</option>
      <option value="Bas%">Bas%</option>
      <option value="RBC">RBC</option>
      <option value="HGB">HGB</option>
      <option value="HCT">HCT</option>
      <option value="MCV">MCV</option>
      <option value="MCH">MCH</option>
      <option value="MCHC">MCHC</option>
      <option value="RDW-CV">RDW-CV</option>
      <option value="RDW-SD">RDW-SD</option>
     
    </select>
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



