<?php
session_start();
include "../backend/validalogin.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Privado</title>
    <link href="headerpriv.css" rel="stylesheet">
    <link href="telaprincipal.css" rel="stylesheet">
    <meta charset="utf-8">
</head>


<body>
    <header>
        <a href="../backend/logout.php" class="sair">Sair</a>
    </header>

    <iframe src="headerpriv.html"></iframe>

    <section>
        <h1 class="prin">Conheça nosso Software!!!</h1><br>

        <h2 class="sub">
            Eagle Security
            Software.
        </h2>

        <div>
            <p>
                <li>Proteção anti-vírus</li><br>
                <li>Suporte 24 horas</li><br>
                <li>Manutenção automática</li><br>
                <li>Atualizador de Software</li><br>
                <li>Browser Cleaner e Disk Cleaner</li><br>
                <li>Proteção contra cibercriminosos</li><br>
                <li>Proteção para pagamentos</li><br>
                <li>Proteção contra ransomware</li><br>
            </p>

            <p><a href="" class="download"><strong>Download</strong></a></p>

        </div>
    </section>

    <section>

        <h2 id="vagas">Vagas</h2>

        <p id="vag"><br>
            A Web Security necessita dos seguintes profissionais...
        </p>

        <li class="anl">Analista de Sistemas Júnior</li><br>
        <p class="anldesc">
            Diretoria Transformação e Projetos B2C<br>
            Local de Trabalho: São Paulo<br>
            Trabalharará com soluções inovadoras com diferenciais eficientes e competitivos<br>
            Plano de Carreira<br>
            Salário a combinar<br>
        </p>

        <h4 class="qual">Qualificações</h4>

        <p class="anli">
            Conhecimento técnico em Frameworks<br>
            Application Servers<br>
            Integração de sistemas<br>
            Arquitetura<br>
            Ferramentas de monitoração<br>
            Design Patterns<br>
            Log Analytics<br>
            Debugging<br>
            Troubleshooting<br>

            <h4 class="labelins">Inscreva-se:</h4><a href="mailto:contatodaempresa@empresa.com?subject=Analista de Sistemas Júnior - Vaga" target="_blank" class="inscreva">contatodaempresa@empresa.com</a>
        
        </p>
        <li class="esf">Engenheiro de Software Pleno</li><br>
        <p class="esfdesc">
            Trabalhará em time de qualidade com suporte ao ambiente de produção</br>
            Desenvolvimento e evolução de plataformas PDCA</br>
            Atuação em projetos</br>
            Foco em garantir confiabilidade dos produtos<br>
            Local de Trabalho: São Paulo<br>
            Salário a combinar<br>
        </p>
        <h4 class="qual">Qualificações</h4>
        <p class="esfdesc2">
            Conhecimento técnico em Frameworks<br>
            Application Servers<br>
            Integração de sistemas<br>
            Arquitetura<br>
            Ferramentas de monitoração<br>
            Design Patterns<br>
            Log Analytics<br>
            Debugging<br>
            Troubleshooting<br>

            <h4 class="labeleng">Inscreva-se:</h4><a href="mailto:contatodaempresa@empresa.com?subject=Engenheiro de Software Pleno - Vaga" target="_blank" class="inscreva">contatodaempresa@empresa.com</a><br>

        </p>
    </section>

    <footer>
        <hr class="hedfoot">

        <h2 id="contato">Contatos</h2>

        <h4 class="lbem">E-mail:<a href="mailto:contatodaempresa@empresa.com" target="_blank" class="email">contatodaempresa@empresa.com</a></h4>
        <h4 class="lbtel">Telefone: 9999-9457<div class="telefone"></div></h4>
        <h4 class="lbfac">Facebook: Web Security<div class="facebook"></div></h4>
    </footer>
</body>

</html>