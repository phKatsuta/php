const canvas = document.getElementById('arabescoCanvas');
const ctx = canvas.getContext('2d');

const numPatterns = 30; // Número de padrões
const maxRadius = 150; // Raio máximo dos padrões

// Padrões para armazenar as propriedades dos arabescos
const patterns = Array.from({ length: numPatterns }, () => ({
    x: Math.random() * canvas.width,
    y: Math.random() * canvas.height,
    radius: Math.random() * maxRadius,
    radiusChange: (Math.random() - 0.5) * 2, // Mudança de raio aleatória
    color: `hsl(${Math.random() * 360}, 100%, 50%)`
}));

function drawArabesco() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpa o canvas

    patterns.forEach(pattern => {
        ctx.beginPath();
        ctx.arc(pattern.x, pattern.y, pattern.radius, 0, 2 * Math.PI);
        ctx.lineWidth = 2;
        ctx.strokeStyle = pattern.color;
        ctx.stroke();

        // Atualiza o raio para criar expansão contínua
        pattern.radius += pattern.radiusChange;
        if (pattern.radius > maxRadius || pattern.radius < 5) {
            pattern.radiusChange = -pattern.radiusChange; // Inverte a direção da expansão
        }
    });
}

function animate() {
    drawArabesco();
    requestAnimationFrame(animate); // Solicita a próxima frame de animação
}

animate();
