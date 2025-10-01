import type { NextConfig } from "next";
const nextConfig: NextConfig = { reactStrictMode: true, images: {
        remotePatterns: [
            { protocol: "https", hostname: "api.aydaivf.com" }, // logo
            { protocol: "http", hostname: "127.0.0.1", port: "8000" },
            // CDN kullanırsan buraya ekle
        ],
    },};
export default nextConfig;
