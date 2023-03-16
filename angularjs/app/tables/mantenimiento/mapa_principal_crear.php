<?php
include ("../../conect.php");
include ("../../autenticacion.php");


$var1="";
$editar="";
$tipo="Mapa de Sala Principal";
$tipo2="distribucionP";
$nombreT="la distribución principal";
?>
<div class="row principal">
    <div class="col-lg-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-table"></i> Crear Distribución de <strong>Sala Principal</strong> </h3>
            </div>
            <div class="panel-content pagination2 table-responsive">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Sala</label>
                            <select class="form-control" style="width:100%;">
                                <option value="1">Sala Principal</option>
                            </select>
                            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>   
                            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombre Distribución</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="name" id="nombres" class="form-control" placeholder="Cine" minlength="3" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row principal">
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA A" />
                            </div>
                            <select class="principal-select" id="filaA" size="5" multiple>
                                <option>A9</option>
                                <option>A7</option>
                                <option>A5</option>
                                <option>A3</option>
                                <option>A1</option>
                                <option>A116</option>
                                <option>A115</option>
                                <option>A114</option>
                                <option>A113</option>
                                <option>A112</option>
                                <option>A111</option>
                                <option>A110</option>
                                <option>A109</option>
                                <option>A108</option>
                                <option>A107</option>
                                <option>A106</option>
                                <option>A105</option>
                                <option>A104</option>
                                <option>A103</option>
                                <option>A102</option>
                                <option>A101</option>
                                <option>A2</option>
                                <option>A4</option>
                                <option>A6</option>
                                <option>A8</option>
                                <option>A10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA B" />
                            </div>
                            <select class="principal-select" id="filaB" size="5" multiple>
                                <option>B9</option>
                                <option>B7</option>
                                <option>B5</option>
                                <option>B3</option>
                                <option>B1</option>
                                <option>B117</option>
                                <option>B116</option>
                                <option>B115</option>
                                <option>B114</option>
                                <option>B113</option>
                                <option>B112</option>
                                <option>B111</option>
                                <option>B110</option>
                                <option>B109</option>
                                <option>B108</option>
                                <option>B107</option>
                                <option>B106</option>
                                <option>B105</option>
                                <option>B104</option>
                                <option>B103</option>
                                <option>B102</option>
                                <option>B101</option>
                                <option>B2</option>
                                <option>B4</option>
                                <option>B6</option>
                                <option>B8</option>
                                <option>B10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA C" />
                            </div>
                            <select class="principal-select" id="filaC" size="5" multiple>
                                <option>C19</option>
                                <option>C17</option>
                                <option>C15</option>
                                <option>C13</option>
                                <option>C11</option>
                                <option>C9</option>
                                <option>C7</option>
                                <option>C5</option>
                                <option>C3</option>
                                <option>C1</option>
                                <option>C118</option>
                                <option>C117</option>
                                <option>C116</option>
                                <option>C115</option>
                                <option>C114</option>
                                <option>C113</option>
                                <option>C112</option>
                                <option>C111</option>
                                <option>C110</option>
                                <option>C109</option>
                                <option>C108</option>
                                <option>C107</option>
                                <option>C106</option>
                                <option>C105</option>
                                <option>C104</option>
                                <option>C103</option>
                                <option>C102</option>
                                <option>C101</option>
                                <option>C2</option>
                                <option>C4</option>
                                <option>C6</option>
                                <option>C8</option>
                                <option>C10</option>
                                <option>C12</option>
                                <option>C14</option>
                                <option>C16</option>
                                <option>C18</option>
                                <option>C20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA D" />
                            </div>
                            <select class="principal-select" id="filaD" size="5" multiple>
                                <option>D19</option>
                                <option>D17</option>
                                <option>D15</option>
                                <option>D13</option>
                                <option>D11</option>
                                <option>D9</option>
                                <option>D7</option>
                                <option>D5</option>
                                <option>D3</option>
                                <option>D1</option>
                                <option>D119</option>
                                <option>D118</option>
                                <option>D117</option>
                                <option>D116</option>
                                <option>D115</option>
                                <option>D114</option>
                                <option>D113</option>
                                <option>D112</option>
                                <option>D111</option>
                                <option>D110</option>
                                <option>D109</option>
                                <option>D108</option>
                                <option>D107</option>
                                <option>D106</option>
                                <option>D105</option>
                                <option>D104</option>
                                <option>D103</option>
                                <option>D102</option>
                                <option>D101</option>
                                <option>D2</option>
                                <option>D4</option>
                                <option>D6</option>
                                <option>D8</option>
                                <option>D10</option>
                                <option>D12</option>
                                <option>D14</option>
                                <option>D16</option>
                                <option>D18</option>
                                <option>D20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA E" />
                            </div>
                            <select class="principal-select" id="filaE" size="5" multiple>
                                <option>E19</option>
                                <option>E17</option>
                                <option>E15</option>
                                <option>E13</option>
                                <option>E11</option>
                                <option>E9</option>
                                <option>E7</option>
                                <option>E5</option>
                                <option>E3</option>
                                <option>E1</option>
                                <option>E120</option>
                                <option>E119</option>
                                <option>E118</option>
                                <option>E117</option>
                                <option>E116</option>
                                <option>E115</option>
                                <option>E114</option>
                                <option>E113</option>
                                <option>E112</option>
                                <option>E111</option>
                                <option>E110</option>
                                <option>E109</option>
                                <option>E108</option>
                                <option>E107</option>
                                <option>E106</option>
                                <option>E105</option>
                                <option>E104</option>
                                <option>E103</option>
                                <option>E102</option>
                                <option>E101</option>
                                <option>E2</option>
                                <option>E4</option>
                                <option>E6</option>
                                <option>E8</option>
                                <option>E10</option>
                                <option>E12</option>
                                <option>E14</option>
                                <option>E16</option>
                                <option>E18</option>
                                <option>E20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA F" />
                            </div>
                            <select class="principal-select" id="filaF" size="5" multiple>
                                <option>F19</option>
                                <option>F17</option>
                                <option>F15</option>
                                <option>F13</option>
                                <option>F11</option>
                                <option>F9</option>
                                <option>F7</option>
                                <option>F5</option>
                                <option>F3</option>
                                <option>F1</option>
                                <option>F121</option>
                                <option>F120</option>
                                <option>F119</option>
                                <option>F118</option>
                                <option>F117</option>
                                <option>F116</option>
                                <option>F115</option>
                                <option>F114</option>
                                <option>F113</option>
                                <option>F112</option>
                                <option>F111</option>
                                <option>F110</option>
                                <option>F109</option>
                                <option>F108</option>
                                <option>F107</option>
                                <option>F106</option>
                                <option>F105</option>
                                <option>F104</option>
                                <option>F103</option>
                                <option>F102</option>
                                <option>F101</option>
                                <option>F2</option>
                                <option>F4</option>
                                <option>F6</option>
                                <option>F8</option>
                                <option>F10</option>
                                <option>F12</option>
                                <option>F14</option>
                                <option>F16</option>
                                <option>F18</option>
                                <option>F20</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row principal">
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA G" />
                            </div>
                            <select class="principal-select" id="filaG" size="5" multiple>
                                <option>G19</option>
                                <option>G17</option>
                                <option>G15</option>
                                <option>G13</option>
                                <option>G11</option>
                                <option>G9</option>
                                <option>G7</option>
                                <option>G5</option>
                                <option>G3</option>
                                <option>G1</option>
                                <option>G122</option>
                                <option>G121</option>
                                <option>G120</option>
                                <option>G119</option>
                                <option>G118</option>
                                <option>G117</option>
                                <option>G116</option>
                                <option>G115</option>
                                <option>G114</option>
                                <option>G113</option>
                                <option>G112</option>
                                <option>G111</option>
                                <option>G110</option>
                                <option>G109</option>
                                <option>G108</option>
                                <option>G107</option>
                                <option>G106</option>
                                <option>G105</option>
                                <option>G104</option>
                                <option>G103</option>
                                <option>G102</option>
                                <option>G101</option>
                                <option>G2</option>
                                <option>G4</option>
                                <option>G6</option>
                                <option>G8</option>
                                <option>G10</option>
                                <option>G12</option>
                                <option>G14</option>
                                <option>G16</option>
                                <option>G18</option>
                                <option>G20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA H" />
                            </div>
                            <select class="principal-select" id="filaH" size="5" multiple>
                                <option>H17</option>
                                <option>H15</option>
                                <option>H13</option>
                                <option>H11</option>
                                <option>H9</option>
                                <option>H7</option>
                                <option>H5</option>
                                <option>H3</option>
                                <option>H1</option>
                                <option>H123</option>
                                <option>H122</option>
                                <option>H121</option>
                                <option>H120</option>
                                <option>H119</option>
                                <option>H118</option>
                                <option>H117</option>
                                <option>H116</option>
                                <option>H115</option>
                                <option>H114</option>
                                <option>H113</option>
                                <option>H112</option>
                                <option>H111</option>
                                <option>H110</option>
                                <option>H109</option>
                                <option>H108</option>
                                <option>H107</option>
                                <option>H106</option>
                                <option>H105</option>
                                <option>H104</option>
                                <option>H103</option>
                                <option>H102</option>
                                <option>H101</option>
                                <option>H2</option>
                                <option>H4</option>
                                <option>H6</option>
                                <option>H8</option>
                                <option>H10</option>
                                <option>H12</option>
                                <option>H14</option>
                                <option>H16</option>
                                <option>H18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA J" />
                            </div>
                            <select class="principal-select" id="filaJ" size="5" multiple>
                                <option>J17</option>
                                <option>J15</option>
                                <option>J13</option>
                                <option>J11</option>
                                <option>J9</option>
                                <option>J7</option>
                                <option>J5</option>
                                <option>J3</option>
                                <option>J1</option>
                                <option>J124</option>
                                <option>J123</option>
                                <option>J122</option>
                                <option>J121</option>
                                <option>J120</option>
                                <option>J119</option>
                                <option>J118</option>
                                <option>J117</option>
                                <option>J116</option>
                                <option>J115</option>
                                <option>J114</option>
                                <option>J113</option>
                                <option>J112</option>
                                <option>J111</option>
                                <option>J110</option>
                                <option>J109</option>
                                <option>J108</option>
                                <option>J107</option>
                                <option>J106</option>
                                <option>J105</option>
                                <option>J104</option>
                                <option>J103</option>
                                <option>J102</option>
                                <option>J101</option>
                                <option>J2</option>
                                <option>J4</option>
                                <option>J6</option>
                                <option>J8</option>
                                <option>J10</option>
                                <option>J12</option>
                                <option>J14</option>
                                <option>J16</option>
                                <option>J18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA K" />
                            </div>
                            <select class="principal-select" id="filaK" size="5" multiple>
                                <option>K17</option>
                                <option>K15</option>
                                <option>K13</option>
                                <option>K11</option>
                                <option>K9</option>
                                <option>K7</option>
                                <option>K5</option>
                                <option>K3</option>
                                <option>K1</option>
                                <option>K125</option>
                                <option>K124</option>
                                <option>K123</option>
                                <option>K122</option>
                                <option>K121</option>
                                <option>K120</option>
                                <option>K119</option>
                                <option>K118</option>
                                <option>K117</option>
                                <option>K116</option>
                                <option>K115</option>
                                <option>K114</option>
                                <option>K113</option>
                                <option>K112</option>
                                <option>K111</option>
                                <option>K110</option>
                                <option>K109</option>
                                <option>K108</option>
                                <option>K107</option>
                                <option>K106</option>
                                <option>K105</option>
                                <option>K104</option>
                                <option>K103</option>
                                <option>K102</option>
                                <option>K101</option>
                                <option>K2</option>
                                <option>K4</option>
                                <option>K6</option>
                                <option>K8</option>
                                <option>K10</option>
                                <option>K12</option>
                                <option>K14</option>
                                <option>K16</option>
                                <option>K18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA L" />
                            </div>
                            <select class="principal-select" id="filaL" size="5" multiple>
                                <option>L17</option>
                                <option>L15</option>
                                <option>L13</option>
                                <option>L11</option>
                                <option>L9</option>
                                <option>L7</option>
                                <option>L5</option>
                                <option>L3</option>
                                <option>L1</option>
                                <option>L126</option>
                                <option>L125</option>
                                <option>L124</option>
                                <option>L123</option>
                                <option>L122</option>
                                <option>L121</option>
                                <option>L120</option>
                                <option>L119</option>
                                <option>L118</option>
                                <option>L117</option>
                                <option>L116</option>
                                <option>L115</option>
                                <option>L114</option>
                                <option>L113</option>
                                <option>L112</option>
                                <option>L111</option>
                                <option>L110</option>
                                <option>L109</option>
                                <option>L108</option>
                                <option>L107</option>
                                <option>L106</option>
                                <option>L105</option>
                                <option>L104</option>
                                <option>L103</option>
                                <option>L102</option>
                                <option>L101</option>
                                <option>L2</option>
                                <option>L4</option>
                                <option>L6</option>
                                <option>L8</option>
                                <option>L10</option>
                                <option>L12</option>
                                <option>L14</option>
                                <option>L16</option>
                                <option>L18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA M" />
                            </div>
                            <select class="principal-select" id="filaM" size="5" multiple>
                                <option>M17</option>
                                <option>M15</option>
                                <option>M13</option>
                                <option>M11</option>
                                <option>M9</option>
                                <option>M7</option>
                                <option>M5</option>
                                <option>M3</option>
                                <option>M1</option>
                                <option>M128</option>
                                <option>M127</option>
                                <option>M126</option>
                                <option>M125</option>
                                <option>M124</option>
                                <option>M123</option>
                                <option>M122</option>
                                <option>M121</option>
                                <option>M120</option>
                                <option>M119</option>
                                <option>M118</option>
                                <option>M117</option>
                                <option>M116</option>
                                <option>M115</option>
                                <option>M114</option>
                                <option>M113</option>
                                <option>M112</option>
                                <option>M111</option>
                                <option>M110</option>
                                <option>M109</option>
                                <option>M108</option>
                                <option>M107</option>
                                <option>M106</option>
                                <option>M105</option>
                                <option>M104</option>
                                <option>M103</option>
                                <option>M102</option>
                                <option>M101</option>
                                <option>M2</option>
                                <option>M4</option>
                                <option>M6</option>
                                <option>M8</option>
                                <option>M10</option>
                                <option>M12</option>
                                <option>M14</option>
                                <option>M16</option>
                                <option>M18</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row principal">
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA N" />
                            </div>
                            <select class="principal-select" id="filaN" size="5" multiple>
                                <option>N17</option>
                                <option>N15</option>
                                <option>N13</option>
                                <option>N11</option>
                                <option>N9</option>
                                <option>N7</option>
                                <option>N5</option>
                                <option>N3</option>
                                <option>N1</option>
                                <option>N129</option>
                                <option>N128</option>
                                <option>N127</option>
                                <option>N126</option>
                                <option>N125</option>
                                <option>N124</option>
                                <option>N123</option>
                                <option>N122</option>
                                <option>N121</option>
                                <option>N120</option>
                                <option>N119</option>
                                <option>N118</option>
                                <option>N117</option>
                                <option>N116</option>
                                <option>N115</option>
                                <option>N114</option>
                                <option>N113</option>
                                <option>N112</option>
                                <option>N111</option>
                                <option>N110</option>
                                <option>N109</option>
                                <option>N108</option>
                                <option>N107</option>
                                <option>N106</option>
                                <option>N105</option>
                                <option>N104</option>
                                <option>N103</option>
                                <option>N102</option>
                                <option>N101</option>
                                <option>N2</option>
                                <option>N4</option>
                                <option>N6</option>
                                <option>N8</option>
                                <option>N10</option>
                                <option>N12</option>
                                <option>N14</option>
                                <option>N16</option>
                                <option>N18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA O" />
                            </div>
                            <select class="principal-select" id="filaO" size="5" multiple>
                                <option>O17</option>
                                <option>O15</option>
                                <option>O13</option>
                                <option>O11</option>
                                <option>O9</option>
                                <option>O7</option>
                                <option>O5</option>
                                <option>O3</option>
                                <option>O1</option>
                                <option>O130</option>
                                <option>O129</option>
                                <option>O128</option>
                                <option>O127</option>
                                <option>O126</option>
                                <option>O125</option>
                                <option>O124</option>
                                <option>O123</option>
                                <option>O122</option>
                                <option>O121</option>
                                <option>O120</option>
                                <option>O119</option>
                                <option>O118</option>
                                <option>O117</option>
                                <option>O116</option>
                                <option>O115</option>
                                <option>O114</option>
                                <option>O113</option>
                                <option>O112</option>
                                <option>O111</option>
                                <option>O110</option>
                                <option>O109</option>
                                <option>O108</option>
                                <option>O107</option>
                                <option>O106</option>
                                <option>O105</option>
                                <option>O104</option>
                                <option>O103</option>
                                <option>O102</option>
                                <option>O101</option>
                                <option>O2</option>
                                <option>O4</option>
                                <option>O6</option>
                                <option>O8</option>
                                <option>O10</option>
                                <option>O12</option>
                                <option>O14</option>
                                <option>O16</option>
                                <option>O18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA P" />
                            </div>
                            <select class="principal-select" id="filaP" size="5" multiple>
                                <option>P17</option>
                                <option>P15</option>
                                <option>P13</option>
                                <option>P11</option>
                                <option>P9</option>
                                <option>P7</option>
                                <option>P5</option>
                                <option>P3</option>
                                <option>P1</option>
                                <option>P131</option>
                                <option>P130</option>
                                <option>P129</option>
                                <option>P128</option>
                                <option>P127</option>
                                <option>P126</option>
                                <option>P125</option>
                                <option>P124</option>
                                <option>P123</option>
                                <option>P122</option>
                                <option>P121</option>
                                <option>P120</option>
                                <option>P119</option>
                                <option>P118</option>
                                <option>P117</option>
                                <option>P116</option>
                                <option>P115</option>
                                <option>P114</option>
                                <option>P113</option>
                                <option>P112</option>
                                <option>P111</option>
                                <option>P110</option>
                                <option>P109</option>
                                <option>P108</option>
                                <option>P107</option>
                                <option>P106</option>
                                <option>P105</option>
                                <option>P104</option>
                                <option>P103</option>
                                <option>P102</option>
                                <option>P101</option>
                                <option>P2</option>
                                <option>P4</option>
                                <option>P6</option>
                                <option>P8</option>
                                <option>P10</option>
                                <option>P12</option>
                                <option>P14</option>
                                <option>P16</option>
                                <option>P18</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA Q" />
                            </div>
                            <select class="principal-select" id="filaQ" size="5" multiple>
                                <option>Q15</option>
                                <option>Q13</option>
                                <option>Q11</option>
                                <option>Q9</option>
                                <option>Q7</option>
                                <option>Q5</option>
                                <option>Q3</option>
                                <option>Q1</option>
                                <option>Q132</option>
                                <option>Q131</option>
                                <option>Q130</option>
                                <option>Q129</option>
                                <option>Q128</option>
                                <option>Q127</option>
                                <option>Q126</option>
                                <option>Q125</option>
                                <option>Q124</option>
                                <option>Q123</option>
                                <option>Q122</option>
                                <option>Q121</option>
                                <option>Q120</option>
                                <option>Q119</option>
                                <option>Q118</option>
                                <option>Q117</option>
                                <option>Q116</option>
                                <option>Q115</option>
                                <option>Q114</option>
                                <option>Q113</option>
                                <option>Q112</option>
                                <option>Q111</option>
                                <option>Q110</option>
                                <option>Q109</option>
                                <option>Q108</option>
                                <option>Q107</option>
                                <option>Q106</option>
                                <option>Q105</option>
                                <option>Q104</option>
                                <option>Q103</option>
                                <option>Q102</option>
                                <option>Q101</option>
                                <option>Q2</option>
                                <option>Q4</option>
                                <option>Q6</option>
                                <option>Q8</option>
                                <option>Q10</option>
                                <option>Q12</option>
                                <option>Q14</option>
                                <option>Q16</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA R" />
                            </div>
                            <select class="principal-select" id="filaR" size="5" multiple>
                                <option>R15</option>
                                <option>R13</option>
                                <option>R11</option>
                                <option>R9</option>
                                <option>R7</option>
                                <option>R5</option>
                                <option>R3</option>
                                <option>R1</option>
                                <option>R133</option>
                                <option>R132</option>
                                <option>R131</option>
                                <option>R130</option>
                                <option>R129</option>
                                <option>R128</option>
                                <option>R127</option>
                                <option>R126</option>
                                <option>R125</option>
                                <option>R124</option>
                                <option>R123</option>
                                <option>R122</option>
                                <option>R121</option>
                                <option>R120</option>
                                <option>R119</option>
                                <option>R118</option>
                                <option>R117</option>
                                <option>R116</option>
                                <option>R115</option>
                                <option>R114</option>
                                <option>R113</option>
                                <option>R112</option>
                                <option>R111</option>
                                <option>R110</option>
                                <option>R109</option>
                                <option>R108</option>
                                <option>R107</option>
                                <option>R106</option>
                                <option>R105</option>
                                <option>R104</option>
                                <option>R103</option>
                                <option>R102</option>
                                <option>R101</option>
                                <option>R2</option>
                                <option>R4</option>
                                <option>R6</option>
                                <option>R8</option>
                                <option>R10</option>
                                <option>R12</option>
                                <option>R14</option>
                                <option>R16</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA S" />
                            </div>
                            <select class="principal-select" id="filaS" size="5" multiple>
                                <option>S15</option>
                                <option>S13</option>
                                <option>S11</option>
                                <option>S9</option>
                                <option>S7</option>
                                <option>S5</option>
                                <option>S3</option>
                                <option>S1</option>
                                <option>S134</option>
                                <option>S133</option>
                                <option>S132</option>
                                <option>S131</option>
                                <option>S130</option>
                                <option>S129</option>
                                <option>S128</option>
                                <option>S127</option>
                                <option>S126</option>
                                <option>S125</option>
                                <option>S124</option>
                                <option>S123</option>
                                <option>S122</option>
                                <option>S121</option>
                                <option>S120</option>
                                <option>S119</option>
                                <option>S118</option>
                                <option>S117</option>
                                <option>S116</option>
                                <option>S115</option>
                                <option>S114</option>
                                <option>S113</option>
                                <option>S112</option>
                                <option>S111</option>
                                <option>S110</option>
                                <option>S109</option>
                                <option>S108</option>
                                <option>S107</option>
                                <option>S106</option>
                                <option>S105</option>
                                <option>S104</option>
                                <option>S103</option>
                                <option>S102</option>
                                <option>S101</option>
                                <option>S2</option>
                                <option>S4</option>
                                <option>S6</option>
                                <option>S8</option>
                                <option>S10</option>
                                <option>S12</option>
                                <option>S14</option>
                                <option>S16</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row principal">
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA T" />
                            </div>
                            <select class="principal-select" id="filaT" size="5" multiple>
                                <option>T15</option>
                                <option>T13</option>
                                <option>T11</option>
                                <option>T9</option>
                                <option>T7</option>
                                <option>T5</option>
                                <option>T3</option>
                                <option>T1</option>
                                <option>T135</option>
                                <option>T134</option>
                                <option>T133</option>
                                <option>T132</option>
                                <option>T131</option>
                                <option>T130</option>
                                <option>T129</option>
                                <option>T128</option>
                                <option>T127</option>
                                <option>T126</option>
                                <option>T125</option>
                                <option>T124</option>
                                <option>T123</option>
                                <option>T122</option>
                                <option>T121</option>
                                <option>T120</option>
                                <option>T119</option>
                                <option>T118</option>
                                <option>T117</option>
                                <option>T116</option>
                                <option>T115</option>
                                <option>T114</option>
                                <option>T113</option>
                                <option>T112</option>
                                <option>T111</option>
                                <option>T110</option>
                                <option>T109</option>
                                <option>T108</option>
                                <option>T107</option>
                                <option>T106</option>
                                <option>T105</option>
                                <option>T104</option>
                                <option>T103</option>
                                <option>T102</option>
                                <option>T101</option>
                                <option>T2</option>
                                <option>T4</option>
                                <option>T6</option>
                                <option>T8</option>
                                <option>T10</option>
                                <option>T12</option>
                                <option>T14</option>
                                <option>T16</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA U" />
                            </div>
                            <select class="principal-select" id="filaU" size="5" multiple>
                                <option>U15</option>
                                <option>U13</option>
                                <option>U11</option>
                                <option>U9</option>
                                <option>U7</option>
                                <option>U5</option>
                                <option>U3</option>
                                <option>U1</option>
                                <option>U136</option>
                                <option>U135</option>
                                <option>U134</option>
                                <option>U133</option>
                                <option>U132</option>
                                <option>U131</option>
                                <option>U130</option>
                                <option>U129</option>
                                <option>U128</option>
                                <option>U127</option>
                                <option>U126</option>
                                <option>U125</option>
                                <option>U124</option>
                                <option>U123</option>
                                <option>U122</option>
                                <option>U121</option>
                                <option>U120</option>
                                <option>U119</option>
                                <option>U118</option>
                                <option>U117</option>
                                <option>U116</option>
                                <option>U115</option>
                                <option>U114</option>
                                <option>U113</option>
                                <option>U112</option>
                                <option>U111</option>
                                <option>U110</option>
                                <option>U109</option>
                                <option>U108</option>
                                <option>U107</option>
                                <option>U106</option>
                                <option>U105</option>
                                <option>U104</option>
                                <option>U103</option>
                                <option>U102</option>
                                <option>U101</option>
                                <option>U2</option>
                                <option>U4</option>
                                <option>U6</option>
                                <option>U8</option>
                                <option>U10</option>
                                <option>U12</option>
                                <option>U14</option>
                                <option>U16</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA V" />
                            </div>
                            <select class="principal-select" id="filaV" size="5" multiple>
                                <option>V15</option>
                                <option>V13</option>
                                <option>V11</option>
                                <option>V9</option>
                                <option>V7</option>
                                <option>V5</option>
                                <option>V3</option>
                                <option>V1</option>
                                <option>V136</option>
                                <option>V135</option>
                                <option>V134</option>
                                <option>V133</option>
                                <option>V132</option>
                                <option>V131</option>
                                <option>V130</option>
                                <option>V129</option>
                                <option>V128</option>
                                <option>V127</option>
                                <option>V126</option>
                                <option>V125</option>
                                <option>V124</option>
                                <option>V123</option>
                                <option>V122</option>
                                <option>V121</option>
                                <option>V120</option>
                                <option>V119</option>
                                <option>V118</option>
                                <option>V117</option>
                                <option>V116</option>
                                <option>V115</option>
                                <option>V114</option>
                                <option>V113</option>
                                <option>V112</option>
                                <option>V111</option>
                                <option>V110</option>
                                <option>V109</option>
                                <option>V108</option>
                                <option>V107</option>
                                <option>V106</option>
                                <option>V105</option>
                                <option>V104</option>
                                <option>V103</option>
                                <option>V102</option>
                                <option>V101</option>
                                <option>V2</option>
                                <option>V4</option>
                                <option>V6</option>
                                <option>V8</option>
                                <option>V10</option>
                                <option>V12</option>
                                <option>V14</option>
                                <option>V16</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="FILA W" />
                            </div>
                            <select class="principal-select" id="filaW" size="5" multiple>
                                <option>W137</option>
                                <option>W136</option>
                                <option>W135</option>
                                <option>W134</option>
                                <option>W133</option>
                                <option>W132</option>
                                <option>W131</option>
                                <option>W130</option>
                                <option>W129</option>
                                <option>W128</option>
                                <option>W127</option>
                                <option>W126</option>
                                <option>W125</option>
                                <option>W124</option>
                                <option>W123</option>
                                <option>W122</option>
                                <option>W121</option>
                                <option>W120</option>
                                <option>W119</option>
                                <option>W118</option>
                                <option>W117</option>
                                <option>W116</option>
                                <option>W115</option>
                                <option>W114</option>
                                <option>W113</option>
                                <option>W112</option>
                                <option>W111</option>
                                <option>W110</option>
                                <option>W109</option>
                                <option>W108</option>
                                <option>W107</option>
                                <option>W106</option>
                                <option>W105</option>
                                <option>W104</option>
                                <option>W103</option>
                                <option>W102</option>
                                <option>W101</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer text-center">
                    <input class="btn btn-sm valA" type="button" id="btnA" value="A" />
                    <input class="btn btn-sm valB"  type="button" id="btnB" value="B" />
                    <input class="btn btn-sm valC"  type="button" id="btnC" value="C" />
                    <input class="btn btn-sm valD"  type="button" id="btnD" value="D" />
                    <input class="btn btn-sm valE"  type="button" id="btnE" value="E" />
                    <input class="btn btn-sm valF"  type="button" id="btnF" value="F" />
                    <input class="btn btn-sm todos"  type="button" id="btnAll" value="TODOS" />
                    <input class="btn btn-sm escoger"  type="button" id="btnReturn" value="REGRESAR" />
                    <input class="btn btn-sm limpio"  type="button" id="btnReturnAll" value="LIMPIAR" />
                </div>
                <div  class="modal-footer text-center" data-toggle="modal" data-target="#modal-responsive3">
                        <button class="mapa btn btn-sm btn-dark" value="2.jpg"><i class="fa fa-plus"></i> Ver Sala</button>
                </div>
                <div class="row principal">
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="PLATEA A" />
                            </div>
                            <select class="principal-select valA" id="ValuesA" size="20" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="PLATEA B" />
                            </div>
                            <select class="principal-select valB" id="ValuesB" size="20" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="PLATEA C" />
                            </div>
                            <select class="principal-select valC" id="ValuesC" size="20" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="PLATEA D" />
                            </div>
                            <select class="principal-select valD" id="ValuesD" size="20" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="PLATEA E" />
                            </div>
                            <select class="principal-select valE" id="ValuesE" size="20" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" id="txtRight" value="PLATEA F" />
                            </div>
                            <select class="principal-select valF" id="ValuesF" size="20" multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square" type="button" id="guardarD" ><i class="fa fa-check"></i> Crear</button>
                    <a class=" btn btn-embossed btn-default " id="cancelar" data-dismiss="modal" aria-hidden="true"> Cancelar </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-responsive3" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-principal">
        <div class="panel">
            <div class="seat-plan-section"> 
                <div  id="imagen1" class="screen-area">
                    <div class="screen-thumb">
                        <img src="../../../assets/boleto/images/movie/screen-thumb.png" alt="movie">
                    </div>
                    <div class="screen-wrapper">
                        <ul class="seat-area">
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="A9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">A</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">A</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="A2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="A10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="B9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">B</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">B</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="B2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="B10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="C19" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">19</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">C</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">C</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="C2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="C20" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">20</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="D19" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">19</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">D</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">D</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="D2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="D20" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">20</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="E19" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">19</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">E</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">E</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="E2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="E20" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">20</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="F19" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">19</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">F</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">F</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="F2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="F20" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">20</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="G19" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">19</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">G</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">G</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="G2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="G20" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">20</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="H17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">H</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">H</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="H2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="H18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="J17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">J</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">J</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="J2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="J18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="K17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">K</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">K</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="K2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="K18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="L17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">L</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">L</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="L2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="L18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="M17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">M</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">M</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="M2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="M18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="N17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">N</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">N</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="N2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="N18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="O17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">O</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">O</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="O2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="O18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="P17" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">17</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">P</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">P</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="P2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="P18" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">18</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="Q15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">Q</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">Q</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="Q2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="Q16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="R15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">R</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R133" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">133</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">R</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="R2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="R16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="S15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">S</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S134" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">134</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S133" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">133</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">S</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="S2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="S16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="T15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">T</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T135" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">135</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T134" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">134</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T133" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">133</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">T</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="T2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="T16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="U15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">U</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U136" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">136</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U135" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">135</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U134" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">134</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U133" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">133</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">U</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="U2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="U16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="V15" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">15</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V13" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">13</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V11" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">11</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V9" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">9</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V7" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">7</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V5" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">5</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V3" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">3</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V1" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">1</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">V</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V136" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">136</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V135" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">135</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V134" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">134</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V133" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">133</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">V</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="V2" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">2</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V4" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">4</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V6" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">6</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V8" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">8</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V10" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">10</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V12" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">12</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V14" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">14</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="V16" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">16</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span></span>
                            </li>
                            <li class="seat-line">
                                <span></span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">W</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W137" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">137</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W136" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">136</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W135" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">135</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W134" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">134</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W133" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">133</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W132" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">132</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W131" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">131</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W130" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">130</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W129" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">129</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W128" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">128</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W127" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">127</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W126" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">126</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W125" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">125</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W124" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">124</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W123" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">123</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W122" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">122</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W121" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">121</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W120" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">120</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W119" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">119</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W118" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">118</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W117" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">117</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W116" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">116</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W115" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">115</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W114" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">114</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W113" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">113</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W112" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">112</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W111" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">111</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W110" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">110</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W109" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">109</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W108" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">108</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W107" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">107</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W106" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">106</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W105" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">105</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W104" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">104</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W103" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">103</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W102" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">102</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="W101" src="../../../assets/boleto/images/movie/area1.png" alt="seat">
                                                <span class="sit-num">101</span>
                                            </li>
                                            <li class="single-seat">
                                                <img id="" src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                <span class="sit-num1">W</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$transport->close();
?>