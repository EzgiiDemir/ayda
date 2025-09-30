import Container from "./ui/Container";

export default function Hero({ title, intro, image = "/images/banner.jpg" }: { title: string; intro?: string; image?: string }) {
    return (
        <section className="py-14 text-center text-white" style={{ backgroundImage: `url(${image})`, backgroundSize: "cover", backgroundPosition: "center" }}>
            <Container>
                <h1 className="text-3xl md:text-5xl font-semibold whitespace-pre-line drop-shadow">{title}</h1>
                {intro ? <p className="mt-4 opacity-90">{intro}</p> : null}
            </Container>
        </section>
    );
}
