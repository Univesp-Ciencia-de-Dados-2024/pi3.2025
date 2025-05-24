
    <div class="container">
        <section class="welcome-section">
            <h1>Sistema de Participação Popular</h1>
            <p>Bem-vindo ao projeto de participação popular da Câmara Municipal! Aqui você pode se cadastrar e contribuir com ideias e sugestões que vão ajudar a construir uma cidade melhor. Sua opinião é importante para nós!</p>
        </section>
        <section class="form-section">
            <h1>Cadastre-se</h1>
            <form method="post" action="home/cadastrar" name="formulario" id="formulario">
            <input type="email" name="email" id="email" placeholder="Email" required>
    
            <input type="password" name="password" id="password" placeholder="Digite uma Senha (minimo 6 caracteres)" minlength="6" required>
    
            <input type="password" name="confirmacao" id="confirmacao" placeholder="Confirme a Senha" required oninput="this.setCustomValidity(this.value !== document.getElementById('password').value ? 'As senhas não coincidem' : '')">
    
            <button type="submit">Cadastrar</button>
            </form>

        </section>
    </div>
